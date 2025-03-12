*** Settings ***
Documentation    Test suite for verifying translation on the home page including language menu.
Library          SeleniumLibrary
Test Teardown    Close Browser

*** Variables ***
${BROWSER}       Chrome
${URL}           https://csweb0367.cpkkuhost.com/
${WAIT_TIME}     5s

# ✅ อัปเดต XPath ตาม HTML ที่ให้มา
${LANG_DROPDOWN}        xpath=//a[@id="navbarDropdownMenuLink"]  
${LANG_TO_THAI}         xpath=//a[contains(text(), 'ไทย')]  
${LANG_TO_ENGLISH}      xpath=//a[contains(text(), 'English')]  
${LANG_TO_CHINESE}      xpath=//a[contains(text(), '中文')]  

# ✅ คำที่ใช้ตรวจสอบว่าภาษาเปลี่ยน
${EXPECTED_THAI_TEXT}       รายงานจำนวนบทความทั้งหมด (สะสมตลอด 5 ปี) 
${EXPECTED_ENGLISH_TEXT}    Report the total number of articles (5 years : cumulative)
${EXPECTED_CHINESE_TEXT}    报告总文章数 (5年累计)

*** Keywords ***
Open Browser To Home Page
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Wait Until Element Is Visible    ${LANG_DROPDOWN}    timeout=10s

Wait And Click
    [Arguments]    ${locator}
    Wait Until Element Is Visible    ${locator}    timeout=10s
    Click Element    ${locator}

Select Language
    [Arguments]    ${language_locator}    ${expected_text}
    Wait And Click    ${LANG_DROPDOWN}   # เปิดเมนู dropdown
    Sleep    1s
    Wait And Click    ${language_locator}  # เลือกภาษา
    Sleep    3s  
    Reload Page  
    Sleep    3s  
    Wait Until Page Contains    ${expected_text}    timeout=15s  

*** Test Cases ***
English To Thai
    [Documentation]    Start in English, switch to Thai and verify.
    Open Browser To Home Page
    Sleep    ${WAIT_TIME}
    Select Language    ${LANG_TO_THAI}    ${EXPECTED_THAI_TEXT}

English To Chinese
    [Documentation]    Start in English, switch to Chinese and verify.
    Open Browser To Home Page
    Sleep    ${WAIT_TIME}
    Select Language    ${LANG_TO_CHINESE}    ${EXPECTED_CHINESE_TEXT}
