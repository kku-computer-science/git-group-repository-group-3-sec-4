*** Settings ***
#Resource          language_switch_resource.robot
#Test Setup         Open Browser  
#Test Teardown      Close Browser
Library            SeleniumLibrary

*** Variables ***
${WELCOME URL}    http://localhost:8000   # เปลี่ยนเป็น URL ของหน้า Home
${BROWSER}        Chrome
    
*** Test Cases ***
Test01 - Switch Language Without Login
    [Documentation]    ทดสอบการเปลี่ยนภาษาทั้งเว็บเมื่อยังไม่ได้ล็อกอิน   
    Open Browser    ${WELCOME URL}    ${BROWSER} 
    Wait Until Element Is Visible        timeout=10s
    Verify Default Language Is English
    Switch Language To Thai 
    Verify Language Is Thai 
    Refresh Page And Verify Default Language Is English
    Close Browser
    Open Browser    ${WELCOME URL}    ${BROWSER}  
    Verify Default Language Is English
    Close Browser

Test02 Reset Language After Close Browser 
    Open Browser    ${WELCOME URL}    ${BROWSER} 
    Wait Until Element Is Visible        timeout=10s
    Switch Language To Thai
    Check Language Is Thai
    Close Browser
    Open Browser    ${WELCOME URL}    ${BROWSER}  
    Check Default Language Is English

*** Keywords ***
Verify Default Language Is English
    ${text}=    Get Text    xpath=//*[@id='btn-home']
    Should Be Equal    ${text}    HOME

Switch Language To Thai 
    Click Element    xpath=//a[@class='langswitch']
    Sleep    2s    # รอให้ภาษาเปลี่ยน

Verify Language Is Thai 
    ${text}=    Get Text    xpath=//*[@id='btn-home']
    Should Be Equal    ${text}    หน้าแรก

Refresh Page And Verify Default Language Is English
    Reload Page
    Sleep    2s
    Verify Default Language Is English
