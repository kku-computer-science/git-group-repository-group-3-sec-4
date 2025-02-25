*** Settings ***
Library           SeleniumLibrary

*** Variables ***
${LANG_BTN}         xpath=//button[@id='lang-switch']
${TEXT_TO_CHECK}    xpath=//h1[@id='main-title']
${EN_TEXT}          Welcome
${TH_TEXT}          สวัสดี

*** Keywords ***
Open Browser To Home Page
    ${chrome_options}    Evaluate    sys.modules['selenium.webdriver'].ChromeOptions()    sys
    ${chrome_options.binary_location}    Set Variable    ${CHROME_BROWSER_PATH}
    ${service}    Evaluate    sys.modules["selenium.webdriver.chrome.service"].Service(executable_path=r"${CHROME_DRIVER_PATH}")
    Create Webdriver    Chrome    options=${chrome_options}    service=${service}
    Go To    ${WELCOME URL}
    Home Page Should Be Open

#for test01
Home Page Should Be Open
    Title Should Be    Home Page

Verify Default Language Is English
    ${text}    Get Text    xpath=//h1[@id='main-title']
    Should Be Equal    ${text}    Welcome

Switch Language To Thai
    Click Element    xpath=//button[@id='lang-switch']
    Sleep    ${DELAY}    # รอให้ภาษาเปลี่ยน

Verify Language Is Thai
    ${text}    Get Text    xpath=//h1[@id='main-title']
    Should Be Equal    ${text}    สวัสดี

Refresh Page And Verify Default Language Is English
    Reload Page
    Sleep    ${DELAY}
    Verify Default Language Is English

Close Browser And Reopen
    Close Browser
    Open Browser To Home Page

#for test02
Verify Default Language Is English
    [Documentation]    ตรวจสอบว่าภาษาเริ่มต้นเป็นภาษาอังกฤษ
    ${text}    Get Text    xpath=//h1[@id='main-title']
    Should Be Equal    ${text}    Welcome

Verify User Status Is In English
    [Documentation]    ตรวจสอบว่า Status ของผู้ใช้เป็นภาษาอังกฤษ
    ${status}    Get Text    xpath=//span[@id='user-status']
    Should Be Equal    ${status}    Active

Switch Language To Thai
    [Documentation]    เปลี่ยนภาษาเป็นภาษาไทย
    Click Element    xpath=//button[@id='lang-switch']
    Sleep    ${DELAY}    # รอให้ภาษาเปลี่ยน

Verify Language Is Thai
    [Documentation]    ตรวจสอบว่าภาษาเป็นภาษาไทย
    ${text}    Get Text    xpath=//h1[@id='main-title']
    Should Be Equal    ${text}    สวัสดี

Verify User Status Is In Thai
    [Documentation]    ตรวจสอบว่า Status ของผู้ใช้เป็นภาษาไทย
    ${status}    Get Text    xpath=//span[@id='user-status']
    Should Be Equal    ${status}    ใช้งานอยู่

Login Again
    [Documentation]    ล็อกอินใหม่หลังจากปิด Browser
    Go To    ${LOGIN URL}
    Input Username    ${VALID USER}
    Input Password    ${VALID PASSWORD}
    Submit Credentials
    Welcome Page Should Be Open

Logout
    [Documentation]    ล็อกเอาท์ออกจากระบบ
    Click Element    xpath=//button[@id='logout-button']
    Sleep    ${DELAY}
    Login Page Should Be Open

#for test03 
Verify Default Language For New Content Is English
    [Documentation]    ตรวจสอบว่าข้อมูลใหม่เป็นภาษาอังกฤษ
    ${new_content}    Get Text    xpath=//div[@id='new-content']
    Should Be Equal    ${new_content}    Researcher: John Doe

Verify New Content Is Thai
    [Documentation]    ตรวจสอบว่าข้อมูลใหม่เปลี่ยนเป็นภาษาไทย
    ${new_content}    Get Text    xpath=//div[@id='new-content']
    Should Be Equal    ${new_content}    นักวิจัย: จอห์น โด

Switch Language To English
    Click Element    xpath=//button[@id='lang-switch']
    Sleep    ${DELAY}    # รอให้ภาษาเปลี่ยน

Switch Language To Thai
    Click Element    xpath=//button[@id='lang-switch']
    Sleep    ${DELAY}    # รอให้ภาษาเปลี่ยน

#for test04
Go To Edit Profile Page
    [Documentation]    เข้าสู่หน้าที่ใช้แก้ไขข้อมูลผู้ใช้
    Click Element    xpath=//a[@id='edit-profile-link']
    Sleep    ${DELAY}
    Edit Profile Page Should Be Open

Edit Profile Page Should Be Open
    [Documentation]    ตรวจสอบว่าหน้าแก้ไขข้อมูลเปิดขึ้นถูกต้อง
    Title Should Be    Edit Profile

Edit User Name To English
    [Documentation]    แก้ไขชื่อผู้ใช้เป็นภาษาอังกฤษ
    Input Text    xpath=//input[@id='username-field']    John Doe
    Click Button    xpath=//button[@id='save-button']
    Sleep    ${DELAY}
    Verify User Name Is In English

Edit User Name To Thai
    [Documentation]    แก้ไขชื่อผู้ใช้เป็นภาษาไทย
    Input Text    xpath=//input[@id='username-field']    สมชาย ใจดี
    Click Button    xpath=//button[@id='save-button']
    Sleep    ${DELAY}
    Verify User Name Is In Thai

Verify User Name Is In English
    [Documentation]    ตรวจสอบว่าชื่อผู้ใช้เป็นภาษาอังกฤษ
    ${name}    Get Text    xpath=//span[@id='username-display']
    Should Be Equal    ${name}    John Doe

Verify User Name Is In Thai
    [Documentation]    ตรวจสอบว่าชื่อผู้ใช้เป็นภาษาไทย
    ${name}    Get Text    xpath=//span[@id='username-display']
    Should Be Equal    ${name}    สมชาย ใจดี

#add func switch language
*** Keywords ***
Switch Language To Chinese
    [Documentation]    เปลี่ยนภาษาเป็นภาษาจีน
    Click Element    xpath=//a[@data-lang='zh']
    Page Should Contain    中文
    Sleep    ${DELAY}

Switch Language To English
    [Documentation]    เปลี่ยนภาษาเป็นภาษาอังกฤษ
    Click Element    xpath=//a[@data-lang='en']
    Page Should Contain    English
    Sleep    ${DELAY}

Switch Language To Thai
    [Documentation]    เปลี่ยนภาษาเป็นภาษาไทย
    Click Element    xpath=//a[@data-lang='th']
    Page Should Contain    ภาษาไทย
    Sleep    ${DELAY}

Verify Page Language
    [Arguments]    ${language}
    [Documentation]    ตรวจสอบว่าหน้าปัจจุบันเป็นภาษาที่ต้องการ
    Run Keyword If    '${language}' == 'Chinese'    Page Should Contain    中文
    ...    ELSE IF    '${language}' == 'English'    Page Should Contain    English
    ...    ELSE IF    '${language}' == 'Thai'       Page Should Contain    ภาษาไทย
