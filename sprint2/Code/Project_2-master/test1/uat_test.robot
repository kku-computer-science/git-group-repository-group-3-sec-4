*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${URL}            http://localhost:8000
${BROWSER}        Chrome

*** Test Cases ***
Open Home Page
    Open Browser    ${URL}    ${BROWSER}
    Wait Until Page Contains    Welcome
    Capture Page Screenshot
    Close Browser
