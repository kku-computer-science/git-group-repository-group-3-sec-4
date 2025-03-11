*** Settings ***
Documentation    Test suite for verifying language switching on the Report page.
Library          SeleniumLibrary
Library          String
Test Teardown    Close Browser

*** Variables ***
${BROWSER}       Chrome
${HOME_URL}      http://127.0.0.1:8000/
${REPORT_URL}    http://127.0.0.1:8000/reports
${WAIT_TIME}     5s

# ✅ Locators สำหรับ Dropdown และตัวเลือกภาษา
${REPORT_MENU}            xpath=//a[contains(@href, '/reports')]
${LANG_DROPDOWN}         xpath=//a[@id="navbarDropdownMenuLink"]
${LANG_TO_THAI}          xpath=//a[contains(text(), 'ไทย')]
${LANG_TO_ENGLISH}       xpath=//a[contains(text(), 'English')]
${LANG_TO_CHINESE}       xpath=//a[contains(text(), '中文')]

# ✅ คำที่ใช้ตรวจสอบว่าเปลี่ยนภาษาแล้ว
@{EXPECTED_REPORT_EN}    Statistics of articles in the last 5 years    Statistics of cited articles    
@{EXPECTED_REPORT_TH}    สถิติจำนวนบทความทั้งหมด 5 ปี    สถิติจำนวนบทความที่ได้รับการอ้างอิง    
@{EXPECTED_REPORT_CN}    过去5年的文章统计    被引用文章的统计    

*** Keywords ***
Open Browser To Home Page
    Open Browser    ${HOME_URL}    ${BROWSER}
    Maximize Browser Window
    Wait Until Page Contains Element    ${REPORT_MENU}    timeout=10s

Navigate To Report Page
    Click Element    ${REPORT_MENU}
    Wait Until Page Contains    Report    timeout=10s

Wait And Click
    [Arguments]    ${locator}
    Wait Until Element Is Visible    ${locator}    timeout=10s
    Click Element    ${locator}

Verify Page Contains Multiple Texts
    [Arguments]    @{expected_texts}
    ${html_source}=    Get Source
    Log    HTML Source: ${html_source}
    FOR    ${text}    IN    @{expected_texts}
        Should Contain    ${html_source}    ${text}
    END

Switch Language And Verify
    [Arguments]    ${lang_button}    @{expected_texts}
    Click Element    ${LANG_DROPDOWN}
    Sleep    1s
    Run Keyword And Ignore Error    Click Element    ${lang_button}
    Sleep    3s
    Verify Page Contains Multiple Texts    @{expected_texts}

*** Test Cases ***
Navigate To Report Page And Switch To Thai
    Open Browser To Home Page
    Navigate To Report Page
    Switch Language And Verify    ${LANG_TO_THAI}    @{EXPECTED_REPORT_TH}
    Close Browser

Navigate To Report Page And Switch To Chinese
    Open Browser To Home Page
    Navigate To Report Page
    Switch Language And Verify    ${LANG_TO_CHINESE}    @{EXPECTED_REPORT_CN}
    Close Browser

Navigate To Report Page And Switch To English
    Open Browser To Home Page
    Navigate To Report Page
    Switch Language And Verify    ${LANG_TO_ENGLISH}    @{EXPECTED_REPORT_EN}
    Close Browser