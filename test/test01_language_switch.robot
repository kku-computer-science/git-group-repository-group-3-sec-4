*** Settings ***
Resource          language_switch_resource.robot
Test Setup         Open Browser To Welcome Page
Test Teardown      Close Browser
Library            SeleniumLibrary

    
*** Test Cases ***
Test01 - Switch Language Without Login
    [Documentation]    ทดสอบการเปลี่ยนภาษาทั้งเว็บเมื่อยังไม่ได้ล็อกอิน
    Open Browser To Welcome Page   
    Verify Default Language Is English
    Switch Language To Thai 01
    Verify Language Is Thai 01
    Refresh Page And Verify Default Language Is English
    Close Browser
    Open Browser To Welcome Page
    Verify Default Language Is English

Test02 Reset Language After Close Browser
    Open Browser To Welcome Page  
    Check Default Language Is English
    Switch To Thai
    Check Language Is Thai
    Close Browser
    Open Browser To Welcome Page
    Check Default Language Is English

*** Keywords ***
Verify Default Language Is English
    ${text}=    Get Text    xpath=//*[@id='btn-home']
    Should Be Equal    ${text}    HOME

Switch Language To Thai 01
    Click Element    xpath=//button[@id='lang-switch']
    Sleep    2s    # รอให้ภาษาเปลี่ยน

Verify Language Is Thai 01
    ${text}=    Get Text    xpath=//*[@id='btn-home']
    Should Be Equal    ${text}    หน้าแรก

Refresh Page And Verify Default Language Is English
    Reload Page
    Sleep    2s
    Verify Default Language Is English
