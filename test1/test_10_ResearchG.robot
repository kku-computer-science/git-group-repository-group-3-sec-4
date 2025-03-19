*** Settings ***
Documentation    Test suite for verifying language switching on the ResearchersGroup page.
Library          SeleniumLibrary
Library          String
Test Teardown    Close Browser

*** Variables ***
${BROWSER}       Chrome
${URL}           https://csweb0367.cpkkuhost.com/researchgroup
${WAIT_TIME}     5s

# ✅ Locators สำหรับ Dropdown และตัวเลือกภาษา
${LANG_DROPDOWN}        xpath=//a[@id="navbarDropdownMenuLink"]
${LANG_TO_THAI}         xpath=//a[contains(text(), 'ไทย')]
${LANG_TO_ENGLISH}      xpath=//a[contains(text(), 'English')] 
${LANG_TO_CHINESE}      xpath=//a[contains(text(), '中文')]

 

# ✅ คำที่ใช้ตรวจสอบว่าเปลี่ยนภาษาแล้ว
${EXPECTED_THAI_TEXT}    กลุ่มวิจัย 
${EXPECTED_ENGLISH_TEXT}    Research Group
${EXPECTED_CHINESE_TEXT}    研究组



* Keywords *
Open Browser To ResearchersGroup Page
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

Verify ResearchersGroup Page Text
    [Arguments]    ${expected_text}
    ${html_source}=    Get Source
    Should Contain    ${html_source}    ${expected_text}

* Test Cases *
Switch From English To Thai
    [Documentation]    Start in English and switch to Thai, verify the translation.
    Open Browser To ResearchersGroup Page
    Sleep    ${WAIT_TIME}
    Select Language    ${LANG_TO_THAI}    ${EXPECTED_THAI_TEXT}
    Verify ResearchersGroup Page Text    ${EXPECTED_THAI_TEXT}
  

Switch From English To Chinese
    [Documentation]    Start in English and switch to Chinese, verify the translation.
    Open Browser To ResearchersGroup Page
    Sleep    ${WAIT_TIME}
    Select Language    ${LANG_TO_CHINESE}    ${EXPECTED_CHINESE_TEXT}
    Verify ResearchersGroup Page Text    ${EXPECTED_CHINESE_TEXT}

Switch Back To English
    [Documentation]    Start in another language and switch back to English, verify the translation.
    Open Browser To ResearchersGroup Page
    Sleep    ${WAIT_TIME}
    Page Should Contain    ${EXPECTED_ENGLISH_TEXT}
    Close Browser
