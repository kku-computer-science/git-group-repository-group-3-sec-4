*** Settings ***
Documentation    Test suite for verifying language switching on the Researchers page.
Library          SeleniumLibrary
Library          String
Test Teardown    Close Browser

*** Variables ***
${BROWSER}           Chrome
${HOME_URL}          http://127.0.0.1:8000/
${WAIT_TIME}         3s

# Locators for menu and dropdown
${RESEARCHER_MENU}    xpath=//a[@id='navbarDropdown']
${DROPDOWN_MENU}      xpath=//ul[contains(@class, 'dropdown-menu') and contains(@class, 'show')]
${COMPUTER_SCIENCE}   xpath=//ul[contains(@class, 'dropdown-menu') and contains(@class, 'show')]//a[contains(@href, '/researchers/1')]

# Locators for language switching
${LANG_DROPDOWN_TOGGLE}    xpath=//a[@id="navbarDropdownMenuLink"]
${LANG_TO_THAI}       xpath=//div[contains(@class, 'dropdown-menu')]//a[contains(text(), 'ไทย')]
${LANG_TO_ENGLISH}    xpath=//div[contains(@class, 'dropdown-menu')]//a[contains(text(), 'English')]
${LANG_TO_CHINESE}    xpath=//div[contains(@class, 'dropdown-menu')]//a[contains(text(), '中文')]

# Expected text content
@{EXPECTED_TH}    ผู้วิจัย    ค้นหา    งานวิจัยที่สนใจ    สาขาวิชาวิทยาการคอมพิวเตอร์
@{EXPECTED_EN}    Researchers    Search    Research interests    Computer Science
@{EXPECTED_CN}    研究人员    搜索    計算機科學系    研究兴趣

# Researcher information verification
@{EXPECTED_RESEARCHER_TH}    รศ.ดร.    ปัญญาพล หอระตะ
@{EXPECTED_RESEARCHER_EN}    Punyaphol Horata
@{EXPECTED_RESEARCHER_CN}    Punyaphol Horata

@{EXPECTED_EXPERTISE_TH}    การเรียนรู้ของเครื่องและระบบอัจฉริยะ    ภาษาการเขียนโปรแกรมเชิงวัตถุ    คำนวณซอฟต์    วิศวกรรมซอฟต์แวร์
@{EXPECTED_EXPERTISE_EN}    Machine Learning and Intelligent Systems    Object-Oriented Programming Languages    Soft computing    Software Engineering
@{EXPECTED_EXPERTISE_CN}    机器学习与智能系统    面向对象编程语言    软计算    软件工程

*** Keywords ***
Open Browser To Home Page
    Open Browser    ${HOME_URL}    ${BROWSER}
    Maximize Browser Window

Navigate To Researcher Page
    Click Element    ${RESEARCHER_MENU}
    Wait Until Element Is Visible    ${DROPDOWN_MENU}    ${WAIT_TIME}
    Click Element    ${COMPUTER_SCIENCE}
    Wait Until Page Contains    Researchers    10s

Switch Language And Verify
    [Arguments]    ${lang_button}    @{expected_texts}
    Click Element    ${LANG_DROPDOWN_TOGGLE}
    Sleep    1s
    Run Keyword And Ignore Error    Click Element    ${lang_button}
    Sleep    3s
    Verify Page Contains Multiple Texts    @{expected_texts}

Verify Page Contains Multiple Texts
    [Arguments]    @{expected_texts}
    ${html_source}=    Get Source
    Log    HTML Source: ${html_source}
    FOR    ${text}    IN    @{expected_texts}
        Should Contain    ${html_source}    ${text}
    END

*** Test Cases ***
Navigate To Researcher Page And Switch To Thai
    Open Browser To Home Page
    Navigate To Researcher Page
    Switch Language And Verify    ${LANG_TO_THAI}    @{EXPECTED_TH}
    Close Browser

Navigate To Researcher Page And Switch To English
    Open Browser To Home Page
    Navigate To Researcher Page
    Switch Language And Verify    ${LANG_TO_ENGLISH}    @{EXPECTED_EN}
    Close Browser

Navigate To Researcher Page And Switch To Chinese
    Open Browser To Home Page
    Navigate To Researcher Page
    Switch Language And Verify    ${LANG_TO_CHINESE}    @{EXPECTED_CN}
    Close Browser

Test Researcher Name In Thai
    Open Browser To Home Page
    Navigate To Researcher Page
    Switch Language And Verify    ${LANG_TO_THAI}    @{EXPECTED_RESEARCHER_TH}
    Close Browser

Test Researcher Name In English
    Open Browser To Home Page
    Navigate To Researcher Page
    Switch Language And Verify    ${LANG_TO_ENGLISH}    @{EXPECTED_RESEARCHER_EN}
    Close Browser

Test Researcher Name In Chinese
    Open Browser To Home Page
    Navigate To Researcher Page
    Switch Language And Verify    ${LANG_TO_CHINESE}    @{EXPECTED_RESEARCHER_CN}
    Close Browser

Test Researcher Expertise In Thai
    Open Browser To Home Page
    Navigate To Researcher Page
    Switch Language And Verify    ${LANG_TO_THAI}    @{EXPECTED_EXPERTISE_TH}
    Close Browser

Test Researcher Expertise In English
    Open Browser To Home Page
    Navigate To Researcher Page
    Switch Language And Verify    ${LANG_TO_ENGLISH}    @{EXPECTED_EXPERTISE_EN}
    Close Browser

Test Researcher Expertise In Chinese
    Open Browser To Home Page
    Navigate To Researcher Page
    Switch Language And Verify    ${LANG_TO_CHINESE}    @{EXPECTED_EXPERTISE_CN}
    Close Browser
