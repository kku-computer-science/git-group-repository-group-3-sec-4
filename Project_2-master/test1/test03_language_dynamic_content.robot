#test03

*** Settings ***
#Resource          language_switch_resource.robot
#Test Setup        Open Browser 
#Test Teardown     Close Browser
Library    SeleniumLibrary

*** Test Cases ***
Test03 - Dynamic Content Language Switch
    [Documentation]    ทดสอบการเปลี่ยนภาษาของข้อมูลใหม่ที่เพิ่มเข้ามาบนเว็บ
    Open Browser    ${WELCOME URL}    ${BROWSER} 
    Wait Until Element Is Visible        timeout=10s
    Verify Default Language For New Content Is English
    Switch Language To Thai
    Verify New Content Is Thai
    Switch Language To English 
    Verify New Content Is Englis
    Close Browser

Verify Default Language For New Content Is English
    [Documentation]    ตรวจสอบว่าข้อมูลใหม่เป็นภาษาอังกฤษ
    ${new_content}    Get Text    xpath=//div[@id='new-content']
    Should Be Equal    ${new_content}    Researcher: John Doe

Verify New Content Is Thai
    [Documentation]    ตรวจสอบว่าข้อมูลใหม่เปลี่ยนเป็นภาษาไทย
    ${new_content}    Get Text    xpath=//div[@id='new-content']
    Should Be Equal    ${new_content}    นักวิจัย: จอห์น โด

Switch Language To English 
    Click Element    xpath=//button[@id='langswitch']
    Sleep    ${DELAY}    # รอให้ภาษาเปลี่ยน

Switch Language To Thai
    Click Element    xpath=//button[@id='langswitch']
    Sleep    ${DELAY}    # รอให้ภาษาเปลี่ยน

