#test02




*** Settings ***
#Resource          language_switch_resource.robot
Test Setup        Open Browser 
Test Teardown     Close Browser
Library            SeleniumLibrary

*** Variables ***
${WELCOME URL}    http://localhost:8000   # เปลี่ยนเป็น URL ของหน้า Home
${LOGIN URL}     http://localhost:8000/login 
${BROWSER}        Chrome
${VALID USER}     admin@gmail.com
${VALID PASSWORD}    12345678


*** Test Cases ***
Test02 - Persist Language After Login
    [Documentation]    ทดสอบการเปลี่ยนภาษาหลังล็อกอิน และคงค่าภาษาล่าสุดเมื่อปิดเว็บหรือล็อกเอาท์
    Open Browser    ${LOGIN URL}    ${BROWSER}
    Wait Until Element Is Visible        timeout=10s
    Input Username    ${VALID USER}
    Input Password    ${VALID PASSWORD}
    Submit Credentials
    Welcome Page Should Be Open
    Verify Default Language Is English
    Verify User Status Is In English
    Switch Language To Thai
    Verify Language Is Thai
    Verify User Status Is In Thai
    Close Browser
    Open Browser    ${WELCOME URL}    ${BROWSER}
    Login Again
    Verify Language Is Thai
    Verify User Status Is In Thai
    Switch Language To English
    Logout
    Login Again
    Verify Language Is English
    Verify User Status Is In English

#for test02

#Verify Default Language Is English
 #   [Documentation]    ตรวจสอบว่าภาษาเริ่มต้นเป็นภาษาอังกฤษ
  #  ${text}    Get Text    xpath=//h1[@id='main-title']
   # Should Be Equal    ${text}    Welcome
Check Default Language Is English
    Wait Until Element Is Visible    xpath=//*[@id='btn-home']    timeout=10s
    ${text}      Get Text    xpath=//*[@id='btn-home']
    Should Be Equal    ${text}      HOME


Verify User Status Is In English
    [Documentation]    ตรวจสอบว่า Status ของผู้ใช้เป็นภาษาอังกฤษ
    ${status}    Get Text    xpath=//span[@id='user-status']
    Should Be Equal    ${status}    Active

Switch Language To Thai 02
    [Documentation]    เปลี่ยนภาษาเป็นภาษาไทย
    Click Element    xpath=//button[@id='langswitch']
    Sleep    ${DELAY}    # รอให้ภาษาเปลี่ยน

Verify Language Is Thai 02
    [Documentation]    ตรวจสอบว่าภาษาเป็นภาษาไทย
    Wait Until Element Is Visible    xpath=//*[@id='btn-home']    timeout=10s
    ${text}    Get Text    xpath=//*[@id='btn-home']
    Should Be Equal    ${text}    หน้าแรก

Verify User Status Is In Thai
    [Documentation]    ตรวจสอบว่า Status ของผู้ใช้เป็นภาษาไทย
    ${status}    Get Text    xpath=//span[@id='user-status']
    Should Be Equal    ${status}    ใช้งานอยู่

Login Again
    [Documentation]    ล็อกอินใหม่หลังจากปิด Browser
    Go To    ${LOGIN URL}
    Input Username    ${VALID USER}
    Input Password    ${VALID PASSWORD}
    Submit Credentials
    Welcome Page Should Be Open

Logout
    [Documentation]    ล็อกเอาท์ออกจากระบบ
    Click Element    xpath=//button[@id='logout-button']
    Sleep    ${DELAY}
    Login Page Should Be Open
Welcome Page Should Be Open
    Title Should Be    HOME