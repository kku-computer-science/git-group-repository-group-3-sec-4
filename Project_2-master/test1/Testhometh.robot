*** Settings ***
Library    SeleniumLibrary
Library    RequestsLibrary

*** Variables ***
${URL}    http://127.0.0.1:8000/
${BROWSER}    Firefox

*** Test Cases ***

Test Default Language Thai
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Wait Until Page Contains    ระบบข้อมูลงานวิจัย วิทยาลัยการคอมพิวเตอร์    10
    Page Should Contain    หน้าแรก
    Page Should Contain    ผู้วิจัย
    Page Should Contain    โครงการวิจัย
    Page Should Contain    กลุ่มวิจัย
    Page Should Contain    รายงาน
    Close Browser

Test Change Language to English
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Click Element    xpath=//button[contains(text(), 'English')]   # ปรับตามโครงสร้างเว็บจริง
    Wait Until Page Contains    Research Management System    10
    Page Should Contain    Home
    Page Should Contain    Researchers
    Page Should Contain    Research Projects
    Page Should Contain    Research Groups
    Page Should Contain    Reports
    Close Browser

Test Change Language to Chinese
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Click Element    xpath=//button[contains(text(), '中文')]   # ปรับตามโครงสร้างเว็บจริง
    Wait Until Page Contains    研究管理系统    10
    Page Should Contain    首页
    Page Should Contain    研究人员
    Page Should Contain    研究项目
    Page Should Contain    研究团队
    Page Should Contain    报告
    Close Browser

Test Switch Back to Thai
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Click Element    xpath=//button[contains(text(), 'ภาษาไทย')]   # ปรับตามโครงสร้างเว็บจริง
    Wait Until Page Contains    ระบบข้อมูลงานวิจัย วิทยาลัยการคอมพิวเตอร์    10
    Page Should Contain    หน้าแรก
    Page Should Contain    ผู้วิจัย
    Page Should Contain    โครงการวิจัย
    Page Should Contain    กลุ่มวิจัย
    Page Should Contain    รายงาน
    Close Browser
