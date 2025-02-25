#test02

*** Settings ***
Resource          language_switch_resource.robot
Test Setup        Open Browser To Welcome Page
Test Teardown     Close Browser

*** Test Cases ***
Test02 - Persist Language After Login
    [Documentation]    ทดสอบการเปลี่ยนภาษาหลังล็อกอิน และคงค่าภาษาล่าสุดเมื่อปิดเว็บหรือล็อกเอาท์
    Input Username    ${VALID USER}
    Input Password    ${VALID PASSWORD}
    Submit Credentials
    Welcome Page Should Be Open
    Verify Default Language Is English
    Verify User Status Is In English
    Switch Language To Thai
    Verify Language Is Thai
    Verify User Status Is In Thai
    Close Browser And Reopen
    Login Again
    Verify Language Is Thai
    Verify User Status Is In Thai
    Switch Language To English
    Logout
    Login Again
    Verify Language Is English
    Verify User Status Is In English
