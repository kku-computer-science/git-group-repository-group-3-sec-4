#test01
*** Settings ***
Resource    language_switch_resource.robot


*** Test Cases ***
Test01 - Switch Language Without Login
    [Documentation]    ทดสอบการเปลี่ยนภาษาทั้งเว็บเมื่อยังไม่ได้ล็อกอิน
    Verify Default Language Is English
    Switch Language To Thai
    Verify Language Is Thai
    Refresh Page And Verify Default Language Is English
    Close Browser And Reopen
    Verify Default Language Is English

Test02 Reset Language After Close Browser
    [Setup]    Open Browser To Welcome Page
    Check Default Language Is English
    Switch To Thai
    Check Language Is Thai
    Close Browser
    Open Browser To Welcome Page
    Check Default Language Is English
    [Teardown]    Close Browser

    *** Settings ***
Resource          resource.robot
Test Setup        Open Browser To Login Page
Test Teardown     Close Browser


