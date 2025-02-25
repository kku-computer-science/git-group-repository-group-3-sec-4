#test03

*** Settings ***
Resource          resource.robot
Test Setup        Open Browser To Home Page
Test Teardown     Close Browser

*** Test Cases ***
Test03 - Dynamic Content Language Switch
    [Documentation]    ทดสอบการเปลี่ยนภาษาของข้อมูลใหม่ที่เพิ่มเข้ามาบนเว็บ
    Verify Default Language For New Content Is English
    Switch Language To Thai
    Verify New Content Is Thai
    Switch Language To English
    Verify New Content Is English
