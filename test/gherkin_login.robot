*** Settings ***
Documentation     A test suite with a single Gherkin style test.
...
...               This test is functionally identical to the example in
...               valid_login.robot file.
Resource          resource.robot
Test Teardown     Close Browser

*** Variables ***
# Define the full path to where your ChromeDriver is located
${CHROME_DRIVER_PATH}     C:\\Users\\tt_pe\\Documents\\chrome-win64\\chrome-win64\\chrome.exe

*** Keywords ***
Open Browser To Login Page
    Create Webdriver    Chrome

*** Tasks ***
# Use the keyword that opens the browser
Valid Login
    Open Browser To Login Page