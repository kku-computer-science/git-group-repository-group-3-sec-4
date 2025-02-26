*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${URL}            http://localhost:8000/login    # เปลี่ยนเป็น URL ของหน้า Login
${BROWSER}        Chrome
${ADMIN_USER}     admin
${ADMIN_PASS}     admin123
${LOG_URL}        http://127.0.0.1:8000/admin/system-log  # URL ของหน้า System Log

*** Test Cases ***
Admin Can Access System Log
    Open Browser    ${URL}    ${BROWSER}
    Wait Until Element Is Visible    id=username    timeout=10s
    Input Text      id=username    ${ADMIN_USER}
    Input Text      id=password    ${ADMIN_PASS}
    Click Button    id=login-btn
    Wait Until Page Contains    Dashboard    timeout=10s

    # เข้าสู่หน้า System Log
    Go To    ${LOG_URL}
    Wait Until Page Contains    System Log    timeout=10s
    Capture Page Screenshot

    # ตรวจสอบว่ามีข้อมูลใน Log Table
    Page Should Contain Element    xpath=//table[@id='log-table']
    Capture Page Screenshot

    Close Browser
