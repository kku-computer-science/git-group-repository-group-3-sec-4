*** Settings ***
#Resource          language_switch_resource.robot
#Test Setup        Open Browser 
#Test Teardown     Close Browser
Library    SeleniumLibrary

*** Variables ***
${WELCOME URL}    http://localhost:8000   # เปลี่ยนเป็น URL ของหน้า Home
${LOGIN URL}     http://localhost:8000/login 
${BROWSER}        Chrome
${VALID USER}     admin@gmail.com
${VALID PASSWORD}    12345678

*** Test Cases ***
Test04 - Edit Data And Change Language
    [Documentation]    ทดสอบการแก้ไขข้อมูลและเปลี่ยนภาษา ข้อมูลที่ถูกแก้ไขต้องเปลี่ยนภาษาด้วย
    Open Browser    ${WELCOME URL}    ${BROWSER} 
    Wait Until Element Is Visible        timeout=10s
    Input Username    ${VALID USER}
    Input Password    ${VALID PASSWORD}
    Submit Credentials
    Welcome Page Should Be Open
    Go To Edit Profile Page
    Edit User Name To English
    Verify User Name Is In English
    Switch Language To Thai
    Verify User Name Is In Thai
    Switch Language To English
    Edit User Name To Thai
    Verify User Name Is In Thai
    Switch Language To English
    Verify User Name Is In English
    Close Browser

#for test04
Go To Edit Profile Page
    [Documentation]    เข้าสู่หน้าที่ใช้แก้ไขข้อมูลผู้ใช้
    Click Element    xpath=//a[@id='edit-profile-link']
    Sleep    ${DELAY}
    Edit Profile Page Should Be Open

Edit Profile Page Should Be Open
    [Documentation]    ตรวจสอบว่าหน้าแก้ไขข้อมูลเปิดขึ้นถูกต้อง
    Title Should Be    Edit Profile

Edit User Name To English
    [Documentation]    แก้ไขชื่อผู้ใช้เป็นภาษาอังกฤษ
    Input Text    xpath=//input[@id='username-field']    John Doe
    Click Button    xpath=//button[@id='save-button']
    Sleep    ${DELAY}
    Verify User Name Is In English

Edit User Name To Thai
    [Documentation]    แก้ไขชื่อผู้ใช้เป็นภาษาไทย
    Input Text    xpath=//input[@id='username-field']    สมชาย ใจดี
    Click Button    xpath=//button[@id='save-button']
    Sleep    ${DELAY}
    Verify User Name Is In Thai

Verify User Name Is In English
    [Documentation]    ตรวจสอบว่าชื่อผู้ใช้เป็นภาษาอังกฤษ
    ${name}    Get Text    xpath=//span[@id='username-display']
    Should Be Equal    ${name}    John Doe

Verify User Name Is In Thai
    [Documentation]    ตรวจสอบว่าชื่อผู้ใช้เป็นภาษาไทย
    ${name}    Get Text    xpath=//span[@id='username-display']
    Should Be Equal    ${name}    สมชาย ใจดี