*** Settings ***
Resource          language_switch_resource.robot
Test Setup        Open Browser To Login Page
Test Teardown     Close Browser

*** Test Cases ***
Test04 - Edit Data And Change Language
    [Documentation]    ทดสอบการแก้ไขข้อมูลและเปลี่ยนภาษา ข้อมูลที่ถูกแก้ไขต้องเปลี่ยนภาษาด้วย
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
