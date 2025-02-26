#for test05
*** Settings ***
#Resource          language_switch_resource.robot
Test Setup        Open Browser 
Test Teardown     Close Browser
Library    SeleniumLibrary

*** Variables ***
${WELCOME URL}    http://localhost:8000   # เปลี่ยนเป็น URL ของหน้า Home
${BROWSER}        Chrome


*** Test Cases ***
Test05 - Switch To Chinese And Verify Language And Images
    [Documentation]    ทดสอบการเปลี่ยนภาษาเป็นภาษาจีนในทุกที่ รวมถึงรูปภาพ ยกเว้นชื่องานวิจัย
    Wait Until Element Is Visible        timeout=10s
    Switch Language To Chinese
    Verify All Text In Chinese Except Research Title
    Verify All Images In Chinese

    Switch Language To English
    Verify All Text In English
    Verify All Images In English

*** Keywords ***
Verify All Text In Chinese Except Research Title
    [Documentation]    ตรวจสอบว่าข้อความทุกที่ในเว็บเป็นภาษาจีน ยกเว้นชื่องานวิจัย
    ${elements}    Get Webelements    xpath=//body//*[not(self::script) and not(self::style)]
    :FOR    ${element}    IN    @{elements}
    \    ${text}    Get Text    ${element}
    \    Run Keyword If    "${text}" != ""    Should Match Regexp    ${text}    ^[\\u4e00-\\u9fff\\u3400-\\u4dbf]+$    msg=Found non-Chinese text: ${text}
    \    Run Keyword If    "${text}" != "" AND "Research Title" in ${text}    Should Not Match Regexp    ${text}    ^[\\u4e00-\\u9fff\\u3400-\\u4dbf]+$    msg=Research title should not be in Chinese

Verify All Text In English
    [Documentation]    ตรวจสอบว่าข้อความทุกที่ในเว็บเป็นภาษาอังกฤษ
    ${elements}    Get Webelements    xpath=//body//*[not(self::script) and not(self::style)]
    :FOR    ${element}    IN    @{elements}
    \    ${text}    Get Text    ${element}
    \    Run Keyword If    "${text}" != ""    Should Match Regexp    ${text}    ^[A-Za-z0-9,.!?\\s]+$    msg=Found non-English text: ${text}

Verify All Images In Chinese
    [Documentation]    ตรวจสอบว่ารูปภาพเปลี่ยนตามภาษาจีน (เช่น Banner หรือ Icon)
    ${images}    Get Webelements    xpath=//img
    :FOR    ${img}    IN    @{images}
    \    ${src}    Get Element Attribute    ${img}    src
    \    Should Contain    ${src}    /zh/

Verify All Images In English
    [Documentation]    ตรวจสอบว่ารูปภาพเปลี่ยนกลับเป็นภาษาอังกฤษ
    ${images}    Get Webelements    xpath=//img
    :FOR    ${img}    IN    @{images}
    \    ${src}    Get Element Attribute    ${img}    src
    \    Should Contain    ${src}    /en/
