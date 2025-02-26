*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${SERVER}         localhost:8000
${DELAY}          1
${VALID USER}     admin@gmail.com
${VALID PASSWORD}    12345678
${LOGIN URL}      http://127.0.0.1:8000/login
${WELCOME URL}    http://127.0.0.1:8000  
${ERROR URL}      http://${SERVER}/error.html
#${CHROME_BROWSER_PATH}    ${EXECDIR}${/}ChromeForTesting${/}chrome.exe
${CHROME_BROWSER_PATH}   C:\\Users\\tt_pe\\Documents\\chrome-win64\\chrome-win64\\chrome.exe
#${CHROME_DRIVER_PATH}    ${EXECDIR}${/}ChromeForTesting${/}chromedriver.exe
${CHROME_DRIVER_PATH}    C:\\Users\\tt_pe\\Documents\\chrome-win64\\chrome-win64\\chromedriver.exe

*** Keywords ***
Open Browser To Welcome Page
    ${chrome_options}=    Evaluate    sys.modules['selenium.webdriver'].ChromeOptions()    sys
    ${chrome_options.binary_location}=    Set Variable    ${CHROME_BROWSER_PATH}
    ${service}=    Evaluate    sys.modules["selenium.webdriver.chrome.service"].Service(executable_path=r"${CHROME_DRIVER_PATH}")
    # [selenium >= 4.10] chrome_options change to options
    Create Webdriver    Chrome    options=${chrome_options}    service=${service}
    Go To    ${WELCOME URL}
    Welcome Page Should Be Open

*** Test Cases ***
Open Google
    Open Browser  
    Open Browser To Welcome Page  
    Close Browser
