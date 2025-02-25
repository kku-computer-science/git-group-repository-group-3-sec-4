#test01
*** Settings ***
Resource          language_switch_resource.robot
#Test Setup        Open Browser To Welcome Page 
Test Teardown     Close Browser


*** Test Cases ***
Test01 - Switch Language Without Login
    [Documentation]    ทดสอบการเปลี่ยนภาษาทั้งเว็บเมื่อยังไม่ได้ล็อกอิน
    Open Browser    ${WELCOME URL}    chrome    executable_path=${CHROME_DRIVER_PATH}
    Verify Default Language Is English
    Switch Language To Thai 01
    Verify Language Is Thai 01
    #Switch Language To CN
    #Verify Language Is CN
    Refresh Page And Verify Default Language Is English
    Close Browser And Reopen
    Verify Default Language Is English

Test02 Reset Language After Close Browser
    Open Browser    ${URL}    chrome    executable_path=${CHROME_DRIVER_PATH}
    Check Default Language Is English
    Switch To Thai
    Check Language Is Thai
    Close Browser
    Open Browser To Welcome Page
    Check Default Language Is English
    [Teardown]    Close Browser

    #*** Settings ***
#Resource          language_switch_resource.robot
#Test Setup        Open Browser To Welcome Page
#Test Teardown     Close Browser


