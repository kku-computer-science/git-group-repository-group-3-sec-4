*** Settings ***
Library          SeleniumLibrary
Test Teardown    Close Browser

*** Variables ***
${BROWSER}         chrome
${LOGIN_URL}       http://127.0.0.1:8000/login

# Credentials
${ADMIN_USERNAME}    admin@gmail.com
${ADMIN_PASSWORD}    12345678
${TEACHER_USERNAME}  chakso@kku.ac.th
${TEACHER_PASSWORD}  123456789

# Login Page Elements (จาก HTML หน้า Login)
${USERNAME_FIELD}      xpath=//input[@id='username']
${PASSWORD_FIELD}      xpath=//input[@id='password']
${LOGIN_BUTTON}        xpath=//button[contains(text(), 'Log In')]

# Dashboard Elements (จาก HTML หน้า Dashboard หลัง login)
${DASHBOARD_HEADER}        xpath=//h1[contains(text(), "ระบบการจัดการสารสนเทศการวิจัย")]
${LANGUAGE_DROPDOWN}       xpath=//*[@id="languageDropdown"]
${LOGOUT_BUTTON}           xpath=//a[contains(text(), 'ออกจากระบบ')]

# Admin Menus (จาก Sidebar หน้า Dashboard)
${ADMIN_MANAGE_USERS}      xpath=//span[contains(text(), "ผู้ใช้")]
${ADMIN_MANAGE_ROLES}      xpath=//span[contains(text(), "บทบาท")]
${ADMIN_MANAGE_PERMISSIONS} xpath=//span[contains(text(), "สิทธิ์การใช้งาน")]
${ADMIN_MANAGE_DEPARTMENTS} xpath=//span[contains(text(), "แผนก")]

# Teacher Menus (ตัวอย่างสมมุติ เนื่องจากใน HTML ไม่ปรากฏ ให้ใช้ XPath ตามที่ต้องการ)
${TEACHER_MANAGE_COURSES}  xpath=//span[contains(text(), "จัดการรายวิชา")]
${TEACHER_MANAGE_STUDENTS} xpath=//span[contains(text(), "จัดการนักศึกษา")]

# Language Options
${LANG_TO_THAI}         xpath=//a[contains(text(), "ไทย")]
${LANG_TO_ENGLISH}      xpath=//a[contains(text(), "English")]
${LANG_TO_CHINESE}      xpath=//a[contains(text(), "中文")]

*** Keywords ***
Open Browser To Login Page
    Open Browser    ${LOGIN_URL}    ${BROWSER}
    Maximize Browser Window
    Wait Until Element Is Visible    ${USERNAME_FIELD}    timeout=10s

Login As Admin
    Open Browser To Login Page
    Input Text    ${USERNAME_FIELD}    ${ADMIN_USERNAME}
    Input Text    ${PASSWORD_FIELD}    ${ADMIN_PASSWORD}
    Click Element    ${LOGIN_BUTTON}
    Wait Until Element Is Visible    ${DASHBOARD_HEADER}    timeout=10s

Login As Teacher
    Open Browser To Login Page
    Input Text    ${USERNAME_FIELD}    ${TEACHER_USERNAME}
    Input Text    ${PASSWORD_FIELD}    ${TEACHER_PASSWORD}
    Click Element    ${LOGIN_BUTTON}
    Wait Until Element Is Visible    ${DASHBOARD_HEADER}    timeout=10s

Change Language To English
    Click Element    ${LANGUAGE_DROPDOWN}
    Sleep    1s
    Click Element    ${LANG_TO_ENGLISH}

Change Language To Chinese
    Click Element    ${LANGUAGE_DROPDOWN}
    Sleep    1s
    Click Element    ${LANG_TO_CHINESE}

Go To Menu
    [Arguments]    ${MENU}
    Click Element    ${MENU}
    Wait Until Page Contains Element    ${DASHBOARD_HEADER}    timeout=10s

Logout
    Click Element    ${LOGOUT_BUTTON}
    Wait Until Element Is Visible    ${LOGIN_URL}    timeout=10s

*** Test Cases ***

### Test Cases for Admin Role
Test Admin Dashboard Load
    Login As Admin
    Wait Until Element Is Visible    ${DASHBOARD_HEADER}    timeout=10s
    Logout

Test Admin Manage Users
    Login As Admin
    Go To Menu    ${ADMIN_MANAGE_USERS}
    Logout

Test Admin Manage Roles
    Login As Admin
    Go To Menu    ${ADMIN_MANAGE_ROLES}
    Logout

Test Admin Manage Permissions
    Login As Admin
    Go To Menu    ${ADMIN_MANAGE_PERMISSIONS}
    Logout

Test Admin Manage Departments
    Login As Admin
    Go To Menu    ${ADMIN_MANAGE_DEPARTMENTS}
    Logout

### Test Cases for Teacher Role
Test Teacher Dashboard Load
    Login As Teacher
    Wait Until Element Is Visible    ${DASHBOARD_HEADER}    timeout=10s
    Logout

Test Teacher Manage Courses
    Login As Teacher
    Go To Menu    ${TEACHER_MANAGE_COURSES}
    Logout

Test Teacher Manage Students
    Login As Teacher
    Go To Menu    ${TEACHER_MANAGE_STUDENTS}
    Logout
