






#ไม่น่าได้ใช้ต่อ

*** Settings ***
Library    SeleniumLibrary
Library    WebDriverManager

*** Variables ***
${SERVER}         localhost:8000
${DELAY}          1
${VALID USER}     admin@gmail.com
${VALID PASSWORD}    12345678

${BROWSER}        Chrome
${LOGIN URL}      http://127.0.0.1:8000/login
${WELCOME URL}    http://127.0.0.1:8000  
${ERROR URL}      http://${SERVER}/error.html
#${CHROME_BROWSER_PATH}    ${EXECDIR}${/}ChromeForTesting${/}chrome.exe
#${CHROME_BROWSER_PATH}   C:\\Users\\tt_pe\\Documents\\chrome-win64\\chrome-win64\\chrome.exe
#${CHROME_DRIVER_PATH}    ${EXECDIR}${/}ChromeForTesting${/}chromedriver.exe
#${CHROME_DRIVER_PATH}    C:\\Users\\tt_pe\\Documents\\chrome-win64\\chrome-win64\\chromedriver.exe

${LANG_BTN}         xpath=//button[@id='lang-switch']
${TEXT_TO_CHECK}    xpath=//*[@id='btn-home']
${EN_TEXT}          HOME
${TH_TEXT}          หน้าแรก
${CN_TEXT}          首頁

*** Keywords ***
Open Browser To Welcome Page
    ${chrome_options}=    Evaluate    sys.modules['selenium.webdriver'].ChromeOptions()    sys
    ${chrome_options.binary_location}=    Set Variable    ${CHROME_BROWSER_PATH}
    ${service}=    Evaluate    sys.modules["selenium.webdriver.chrome.service"].Service(executable_path=r"${CHROME_DRIVER_PATH}")
    # [selenium >= 4.10] chrome_options change to options
    Create Webdriver    Chrome    options=${chrome_options}    service=${service}
    Go To    ${WELCOME URL}
    Welcome Page Should Be Open




#for test01
Welcome Page Should Be Open
    Title Should Be    HOME

Verify Default Language Is English
    ${text}    Get Text    xpath=//*[@id='btn-home']
    Should Be Equal    ${text}    HOME

Switch Language To Thai 01
    Click Element    xpath=//button[@id='lang-switch']
    Sleep    ${DELAY}    # รอให้ภาษาเปลี่ยน

Verify Language Is Thai 01
    ${text}    Get Text    xpath=//*[@id='btn-home']
    Should Be Equal    ${text}    หน้าแรก

#Switch Language To CN
#    Click Element    xpath=//button[@id='lang-switch']
 #   Sleep    ${DELAY}    # รอให้ภาษาเปลี่ยน

#Verify Language Is CN
 #   ${text}    Get Text    xpath=//h1[@id='main-title']
  #  Should Be Equal    ${text}    首頁

Refresh Page And Verify Default Language Is English
    Reload Page
    Sleep    ${DELAY}
    Verify Default Language Is English
#for test02

#Verify Default Language Is English
 #   [Documentation]    ตรวจสอบว่าภาษาเริ่มต้นเป็นภาษาอังกฤษ
  #  ${text}    Get Text    xpath=//h1[@id='main-title']
   # Should Be Equal    ${text}    Welcome
Check Default Language Is English
    Wait Until Element Is Visible    xpath=//*[@id='btn-home']    timeout=10s
    ${text}      Get Text    xpath=//*[@id='btn-home']
    Should Be Equal    ${text}      HOME


Verify User Status Is In English
    [Documentation]    ตรวจสอบว่า Status ของผู้ใช้เป็นภาษาอังกฤษ
    ${status}    Get Text    xpath=//span[@id='user-status']
    Should Be Equal    ${status}    Active

Switch Language To Thai 02
    [Documentation]    เปลี่ยนภาษาเป็นภาษาไทย
    Click Element    xpath=//button[@id='lang-switch']
    Sleep    ${DELAY}    # รอให้ภาษาเปลี่ยน

Verify Language Is Thai 02
    [Documentation]    ตรวจสอบว่าภาษาเป็นภาษาไทย
    Wait Until Element Is Visible    xpath=//*[@id='btn-home']    timeout=10s
    ${text}    Get Text    xpath=//*[@id='btn-home']
    Should Be Equal    ${text}    หน้าแรก

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

Switch Language To English 03
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

Switch Language To English func
    [Documentation]    เปลี่ยนภาษาเป็นภาษาอังกฤษ
    Click Element    xpath=//a[@data-lang='en']
    Page Should Contain    English
    Sleep    ${DELAY}

#Switch Language To Thai
 #   [Documentation]    เปลี่ยนภาษาเป็นภาษาไทย
  #  Click Element    xpath=//a[@data-lang='th']
   # Page Should Contain    ภาษาไทย
    #Sleep    ${DELAY}

Verify Page Language
    [Arguments]    ${language}
    [Documentation]    ตรวจสอบว่าหน้าปัจจุบันเป็นภาษาที่ต้องการ
    Run Keyword If    '${language}' == 'Chinese'    Page Should Contain    中文
    ...    ELSE IF    '${language}' == 'English'    Page Should Contain    English
    ...    ELSE IF    '${language}' == 'Thai'       Page Should Contain    ภาษาไทย
