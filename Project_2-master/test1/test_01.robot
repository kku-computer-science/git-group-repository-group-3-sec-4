*** Settings ***
Documentation    Test01-ผู้ใช้ยังไม่ได้ล็อกอิน เปลี่ยนภาษาทั้งเว็บควรจะเป็นภาษานั้นทั้งหมด ถ้าผู้ใช้ออกหรือปิดเว็บก็จะถูกรีเซ็ตเป็นภาษาเริ่มต้น 
#Test Setup         Open Browser To Welcome Page
Test Teardown      Close Browser
Library  SeleniumLibrary
Library  Collections
Library  Process
Library  OperatingSystem


*** Variables ***
${BROWSER}       Chrome
#${URL}           https://csweb0367.cpkkuhost.com/
${URL}           http://localhost:8000
${WAIT_TIME}     5s

# ✅ อัปเดต XPath ตาม HTML ที่ให้มา
${LANG_DROPDOWN}        xpath=//a[@id="navbarDropdownMenuLink"]  
${LANG_TO_THAI}         xpath=//a[contains(text(), 'ไทย')]  
${LANG_TO_ENGLISH}      xpath=//a[contains(text(), 'English')]  
${LANG_TO_CHINESE}      xpath=//a[contains(text(), '中文')] 
${LANG_HOME}            xpath=//a[text()='Home']


# ✅ คำที่ใช้ตรวจสอบว่าภาษาเปลี่ยน
${EXPECTED_THAI_TEXT}       ผลงานตีพิมพ์ (5 ปี ย้อนหลัง)
${EXPECTED_ENGLISH_TEXT}    Publications (In the Last 5 Years)
${EXPECTED_CHINESE_TEXT}    已出版作品（近5年）

*** Keywords ***
Setup WebDriver
    ${chrome_driver}=  Run Process  python  -c  "from webdriver_manager.chrome import ChromeDriverManager; print(ChromeDriverManager().install())"  shell=True
    ${chrome_driver}=  Set Variable  ${chrome_driver.stdout.strip()}
    Set Environment Variable  WEBDRIVER_PATH  ${chrome_driver}

    ${options}=    Evaluate    selenium.webdriver.ChromeOptions()    selenium.webdriver
    Call Method    ${options}    add_argument    --disable-automation
    Call Method    ${options}    add_argument    --disable-infobars
    Call Method    ${options}    add_argument    --start-maximized
    Call Method    ${options}    add_experimental_option    detach    ${True}

    Create WebDriver    Chrome    options=${options}

Open Browser To Home Page
    Setup WebDriver
    Open Browser    ${URL}    ${BROWSER}
    Maximize Browser Window
    Wait Until Element Is Visible    ${LANG_DROPDOWN}    timeout=10s
Wait And Click
    [Arguments]    ${locator}
    Wait Until Element Is Visible    ${locator}    timeout=10s
    Click Element    ${locator}

Select Language
    [Arguments]    ${language_locator}    ${expected_text}
    Wait And Click    ${LANG_DROPDOWN}   # เปิดเมนู dropdown
    Sleep    1s
    Wait And Click    ${language_locator}  # เลือกภาษา
    Sleep    3s  
    Reload Page  
    Sleep    3s  
    Wait Until Page Contains    ${expected_text}    timeout=15s  

*** Test Cases ***
English To Thai
    [Documentation]    Start in English, switch to Thai and verify.
    Open Browser To Home Page
    Sleep    ${WAIT_TIME}
    Select Language    ${LANG_TO_THAI}    ${EXPECTED_THAI_TEXT}

English To Chinese
    [Documentation]    Start in English, switch to Chinese and verify.
    Open Browser To Home Page
    Sleep    ${WAIT_TIME}
    Select Language    ${LANG_TO_CHINESE}    ${EXPECTED_CHINESE_TEXT}
    Close Browser
Test02 Reset Language After Close Browser
    [Documentation]    Open home page and check Language
    Open Browser To Home Page 
    Sleep    ${WAIT_TIME}
    Page Should Contain    ${EXPECTED_ENGLISH_TEXT}
    Close Browser


    # Check Default Language Is English
    # Switch To Thai
    # Check Language Is Thai
    # Close Browser
    # Open Browser To Welcome Page
    # Check Default Language Is English

# *** Test Cases ***
# Test01 - Switch Language Without Login
#     [Documentation]    ทดสอบการเปลี่ยนภาษาทั้งเว็บเมื่อยังไม่ได้ล็อกอิน
#     Open Browser To Welcome Page   
#     Verify Default Language Is English
#     Switch Language To Thai 01
#     Verify Language Is Thai 01
#     Refresh Page And Verify Default Language Is English
#     Close Browser
#     Open Browser To Welcome Page
#     Verify Default Language Is English



# *** Keywords ***
# Verify Default Language Is English
#     ${text}=    Get Text    xpath=//*[@id='btn-home']
#     Should Be Equal    ${text}    HOME

# Switch Language To Thai 01
#     Click Element    xpath=//button[@id='lang-switch']
#     Sleep    2s    # รอให้ภาษาเปลี่ยน

# Verify Language Is Thai 01
#     ${text}=    Get Text    xpath=//*[@id='btn-home']
#     Should Be Equal    ${text}    หน้าแรก

# Refresh Page And Verify Default Language Is English
#     Reload Page
#     Sleep    2s
#     Verify Default Language Is English 