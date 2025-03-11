*** Settings ***
Documentation    Test suite for verifying language switching on the Login page.
Library          SeleniumLibrary
Library          String
Test Teardown    Close Browser

*** Variables ***
${BROWSER}       Chrome
${URL}           http://127.0.0.1:8000
${WAIT_TIME}     5s

# ✅ Locators สำหรับ Dropdown และตัวเลือกภาษา
${LANG_DROPDOWN}        xpath=//a[@id="navbarDropdownMenuLink"]
${LANG_TO_THAI}         xpath=//a[contains(text(), 'ไทย')]
${LANG_TO_ENGLISH}      xpath=//a[contains(text(), 'English')] 
${LANG_TO_CHINESE}      xpath=//a[contains(text(), '中文')]
${LOGIN_TO_THAI}         xpath=//a[contains(text(), 'เข้าสู่ระบบ')]
${LOGIN_TO_ENGLISH}      xpath=//a[contains(text(), 'LOGIN')] 
${LOGIN_TO_CHINESE}      xpath=//a[contains(text(), '登录')]
 

# ✅ คำที่ใช้ตรวจสอบว่าเปลี่ยนภาษาแล้ว
${EXPECTED_THAI_TEXT}    ผลงานตีพิมพ์ (5 ปี ย้อนหลัง)
${EXPECTED_ENGLISH_TEXT}    Publications (In the Last 5 Years)
${EXPECTED_CHINESE_TEXT}    已出版作品（近5年）
${EXPECTED_THAI_LOGIN}    เข้าสู่ระบบ
${EXPECTED_ENGLISH_LOGIN}    LOGIN
${EXPECTED_CHINESE_LOGIN}    登录
# ${EXPECTED_THAI_IN_LOGIN}    การเข้าสู่ระบบบัญชี
# ${EXPECTED_ENGLISH_IN_LOGIN}    Account Login
# ${EXPECTED_CHINESE_IN_LOGIN}    账户登录


*** Keywords ***
Open Browser To HOME Page
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Wait Until Page Contains Element    ${LANG_DROPDOWN}    timeout=10s

Wait And Click
    [Arguments]    ${locator}
    Wait Until Element Is Visible    ${locator}    timeout=10s
    Click Element    ${locator}

Select Language
    [Arguments]    ${language_locator}    ${expected_text}
    Wait And Click    ${LANG_DROPDOWN}  
    Sleep    1s  
    Wait And Click    ${language_locator}  
    Sleep    3s  
    Wait Until Page Contains    ${expected_text}    timeout=10s  

Verify Some Page Text
    [Arguments]    ${expected_text}
    ${html_source}=    Get Source
    Should Contain    ${html_source}    ${expected_text}

*** Test Cases ***
Switch From English To Thai
    [Documentation]    Start in English and switch to Thai, verify the translation.
    Open Browser To HOME Page
    Sleep    ${WAIT_TIME}
    Select Language    ${LANG_TO_THAI}    ${EXPECTED_THAI_TEXT}
    Verify Some Page Text    ${EXPECTED_THAI_TEXT}
    Wait And Click    ${LOGIN_TO_THAI}  
    Sleep    ${WAIT_TIME}
    Wait Until Page Contains    เข้าสู่ระบบ    timeout=10s
    #Verify Some Page Text    ${EXPECTED_THAI_IN_LOGIN} 
  

Switch From English To Chinese
    [Documentation]    Start in English and switch to Chinese, verify the translation.
    Open Browser To HOME Page
    Sleep    ${WAIT_TIME}
    Select Language    ${LANG_TO_CHINESE}    ${EXPECTED_CHINESE_TEXT}
    Verify Some Page Text    ${EXPECTED_CHINESE_TEXT}
    Wait And Click    ${LOGIN_TO_CHINESE}
    Sleep    ${WAIT_TIME}
    Wait Until Page Contains    登录    timeout=10s 
    #Verify Some Page Text    ${EXPECTED_CHINESE_IN_LOGIN}

Switch Back To English
    [Documentation]    Start in another language and switch back to English, verify the translation.
    Open Browser To HOME Page
    Sleep    ${WAIT_TIME}
    Page Should Contain    ${EXPECTED_ENGLISH_LOGIN}
    Verify Some Page Text    ${EXPECTED_ENGLISH_TEXT}
    Wait And Click    ${LOGIN_TO_ENGLISH}
    Sleep    ${WAIT_TIME}
    Wait Until Page Contains      LOGIN  timeout=10s 
    #Verify Some Page Text    ${EXPECTED_ENGLISH_IN_LOGIN}
