#for test06
*** Settings ***
#Resource          language_switch_resource.robot
Test Setup        Open Browser 
Test Teardown     Close Browser
Library    SeleniumLibrary

*** Variables ***
${WELCOME URL}    http://localhost:8000   # เปลี่ยนเป็น URL ของหน้า Home
${LOGIN URL}     http://localhost:8000/login 
${BROWSER}        Chrome
${VALID USER}     admin@gmail.com
${VALID PASSWORD}    12345678

*** Test Cases ***
Test06 - Language Persistence To Login Page
    [Documentation]    ทดสอบการเปลี่ยนภาษาก่อนล็อกอินและคงภาษาล่าสุดเมื่อเข้าสู่หน้า Login
    Wait Until Element Is Visible        timeout=10s
    Switch Language To Chinese
    Go To Login Page
    Verify Login Page In Chinese

    Go Back To Welcome Page
    Switch Language To English
    Go To Login Page
    Verify Login Page In English

*** Keywords ***
Go Back To Welcome Page
    [Documentation]    กลับไปยังหน้าแรก (Welcome Page)
    Go To    ${WELCOME URL}
    Welcome Page Should Be Open

Go To Login Page
    [Documentation]    ไปยังหน้า Login โดยไม่ล็อกอิน
    Click Link    xpath=//a[@href='/login']
    Login Page Should Be Open

Verify Login Page In Chinese
    [Documentation]    ตรวจสอบว่าหน้า Login เป็นภาษาจีน
    Title Should Be    登录页面
    Element Text Should Be    xpath=//label[@for='username']    用户名
    Element Text Should Be    xpath=//label[@for='password']    密码
    Element Attribute Value Should Be    xpath=//button[@id='login_button']    value    登录

Verify Login Page In English
    [Documentation]    ตรวจสอบว่าหน้า Login เป็นภาษาอังกฤษ
    Title Should Be    Login Page
    Element Text Should Be    xpath=//label[@for='username']    Username
    Element Text Should Be    xpath=//label[@for='password']    Password
    Element Attribute Value Should Be    xpath=//button[@id='login_button']    value    Login
