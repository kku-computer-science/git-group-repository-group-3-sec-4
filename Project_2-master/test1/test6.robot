*** Settings ***
Documentation    Test suite for verifying translation and banner image.
Library          SeleniumLibrary
Library          String
Test Teardown    Close Browser

*** Variables ***
${BROWSER}       Chrome
${URL}           http://127.0.0.1:8000/
${WAIT_TIME}     5s

# ✅ Locator ที่อัปเดตแล้ว
${LANG_DROPDOWN}        xpath=//a[@id="navbarDropdownMenuLink"]  
${LANG_TO_THAI}         xpath=//a[contains(text(), 'ไทย')]  
${LANG_TO_ENGLISH}      xpath=//a[contains(text(), 'English')]  
${LANG_TO_CHINESE}      xpath=//a[contains(text(), '中文')]  

# ✅ คำที่ใช้ตรวจสอบว่าเปลี่ยนภาษาแล้ว       
@{EXPECTED_THAI_TEXTS}        
...    รายงานจำนวนบทความทั้งหมด (สะสมตลอด 5 ปี)    
...    สิ่งตีพิมพ์ (ในช่วง 5 ปีที่ผ่านมา)
...    ปี    
...    จำนวนบทความ    
...    ก่อน
...    [อ้างอิง] 

@{EXPECTED_ENGLISH_TEXTS}       
...    Report the total number of articles (5 years : cumulative)   
...    Publications (In the Last 5 Years) 
...    year    
...    Number    
...    Before
...    [refer]

@{EXPECTED_CHINESE_TEXTS} 
...    报告总文章数 (5年累计)  
...    过去五年内的出版物  
...    年    
...    文章数量    
...    之前
...    [参考]

* Keywords *
Open Browser To Home Page
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window

Wait And Click
    [Arguments]    ${locator}
    Wait Until Element Is Visible    ${locator}    timeout=10s
    Click Element    ${locator}

Select Language
    [Arguments]    ${language_locator}    ${expected_text_list}
    Wait And Click    ${LANG_DROPDOWN}  
    Sleep    1s  
    Wait And Click    ${language_locator}  
    Sleep    3s  
    Wait Until Page Contains    ${expected_text_list}[0]    timeout=10s  

Verify Banner For Language
    [Arguments]    ${lang_code}
    ${banner_src}=    Get Element Attribute    xpath=//div[@id='carouselExampleIndicators']//img    src
    Log    Banner src is: ${banner_src}
    Should Contain    ${banner_src}    /img/banner1_${lang_code}.png

Verify Reference Text
    [Arguments]    ${expected_reference}
    Wait Until Page Contains    ${expected_reference}    timeout=10s  

* Test Cases *
English To Thai
    [Documentation]    Switch from English to Thai and verify UI.
    Open Browser To Home Page
    Sleep    ${WAIT_TIME}
    Select Language    ${LANG_TO_THAI}    ${EXPECTED_THAI_TEXTS}
    Verify Banner For Language    th
    Verify Reference Text    อ้างอิง (APA)

English To Chinese
    [Documentation]    Switch from English to Chinese and verify UI.
    Open Browser To Home Page
    Sleep    ${WAIT_TIME}
    Select Language    ${LANG_TO_CHINESE}    ${EXPECTED_CHINESE_TEXTS}
    Verify Banner For Language    cn
    Verify Reference Text    參考文獻（APA）
