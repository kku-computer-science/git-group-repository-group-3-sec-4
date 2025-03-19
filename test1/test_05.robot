*** Settings ***
Library          SeleniumLibrary
Test Teardown    Close Browser

*** Variables ***
${BROWSER}         chrome
${LOGIN_URL}       https://csweb0367.cpkkuhost.com/login
#${LOGIN_URL}       http://localhost:8000/login

# Login Page Elements
${LOGIN_PAGE_HEADER}    xpath=//h1[contains(text(), 'Account Login') or contains(text(), 'เข้าสู่ระบบบัญชี') or contains(text(), '账户登录')]
${USERNAME_FIELD}       xpath=//input[@id='username']
${PASSWORD_FIELD}       xpath=//input[@id='password']
${LOGIN_BUTTON}         xpath=//button[normalize-space(.)='Log In' or normalize-space(.)='LOGIN' or normalize-space(.)='เข้าสู่ระบบ' or normalize-space(.)='登录']
#xpath=//a[contains(text(), 'Login') or contains(text(), 'เข้าสู่ระบบ') or contains(text(), '登录')]
#xpath=//button[normalize-space(.)='Log In' or normalize-space(.)='LOGIN' or normalize-space(.)='เข้าสู่ระบบ' or normalize-space(.)='登录']





# Dashboard Elements
${DASHBOARD_HEADER}    xpath=//h1[contains(text(), 'Research Information Management System') or contains(text(), 'ระบบจัดการข้อมูลการวิจัย') or contains(text(), '研究信息管理系统')]
${LOGOUT_BUTTON}       xpath=//a[contains(text(), 'logout') or contains(text(), 'ออกจากระบบ') or contains(text(), '注销')]

${UPDATE_BUTTON}    xpath=//button[contains(@class, 'btn-primary') and contains(text(), 'Update')]

${ACCOUNT_TITLE}       xpath=//h3[contains(text(), 'Profile Settings')]
     
# User Profile Menu
${USER_PROFILE_MENU}   xpath=//a[contains(@class,'nav-link') and .//span[contains(@class,'menu-title') and (contains(text(),'User Profile') or contains(text(),'โปรไฟล์ผู้ใช้') or contains(text(),'用户配置文件'))]]
${ACCOUNT_TAB}         xpath=//a[@id='account-tab']
${PASSWORD_TAB}        xpath=//a[@id='password-tab']
${EXPERTISE_TAB}       xpath=//a[@id='expertise-tab']
${EDUCATION_TAB}       xpath=//a[@id='education-tab']
${FUND_TAB}            xpath=//a[contains(@class,'nav-link') and .//span[contains(@class,'menu-title') and (contains(text(),'Manage Fund') or contains(text(),'จัดการทุนวิจัย') or contains(text(),'用户资料'))]] 
${FUND_ADD}            xpath=//a[contains(@class, 'btn-primary') and i[contains(@class, 'mdi-plus')]]
${RESPRO_TAB}          xpath=//a[contains(@class,'nav-link') and .//span[contains(@class,'menu-title') and (contains(text(),'Research Project') or contains(text(),'โครงการวิจัย') or contains(text(),'研究项目'))]]  
${RESPRO_ADD}          xpath=//a[contains(@class, 'btn-primary') and i[contains(@class, 'mdi-plus')]]
${RESPRO_VIEW}         xpath=//a[contains(@class, 'btn-outline-primary') and i[contains(@class, 'mdi mdi-eye')]]
${RESG_TAB}            xpath=//a[contains(@class,'nav-link') and .//span[contains(@class,'menu-title') and (contains(text(),'Research Group') or contains(text(),'กลุ่มวิจัย') or contains(text(),'研究小组'))]]
${RESG_ADD}            xpath=//a[contains(@class, 'btn-primary') and i[contains(@class, 'mdi-plus')]]
${RESG_VIEW}           xpath=//a[contains(@class, 'btn-outline-primary') and i[contains(@class, 'mdi mdi-eye')]]
${MAPU_TAB}            xpath=//a[contains(@class,'nav-link') and .//span[contains(@class,'menu-title') and (contains(text(),'Manage Publications') or contains(text(),'จัดการผลงานวิจัย') or contains(text(),'管理研究成果'))]]
${PAPER_TAB}           xpath=//a[normalize-space(text())='Published Research']
${BOOK_TAB}            xpath=//a[normalize-space(text())='Book']
${OTHER_TAB}           xpath=//a[normalize-space(text())='Other academic works']

#xpath=//a[contains(@class, 'nav-link') and contains(@class, 'Published Research')]


#xpath=//a[contains(text(), 'Add') or contains(text(), 'เพิ่ม') or contains(text(), '添加')]
#xpath=//botton[@id='create']

# Language Buttons
${LANG_TO_THAI}       xpath=//a[contains(text(), 'ไทย')]
${LANG_TO_ENGLISH}    xpath=//a[contains(normalize-space(.), 'English')]
${LANG_TO_CHINESE}    xpath=//a[contains(text(), '中文')]

@{EXPECTED_Account_EN}    
...    Profile Settings    
...    Name title    
...    First name (English)    Last name (English)      
...    First name (Thai language)    Last name (Thai language)    Email    Academic Ranks    Academic Position    For teachers who do not have a doctorate degree, please specify.   

@{EXPECTED_Password_EN}    
...    Password Settings    
...    Old password    New password    Confirm new password  

@{EXPECTED_EXPECTED_EN}    
...    Expertise    

@{EXPECTED_EDUCATION_EN}    
...    Educational Record    Bachelor degree    University name    Degree name    Year of graduation
...    Master degree    
...    Doctoral degree
@{EXPECTED_FUND_EN}
...    Fund
...    No.	Fund name	Fund Type	Fund Level	Action
@{EXPECTED_FUND_ADD_EN}
...    Add Research Fund    
...    Enter fund details
...    Fund Type     ---- Please select fund type ----
...    Fund Level    ---- Please select fund type ----
...    Fund Name      
...    Supporting Agency / Research Project    Supporting Agency / Research Project
...    Submit     Cancel
@{EXPECTED_RESPRO_EN}
...    Research Project
...    ADD 
...    Research Project	Year	Project name	Head	Member	Action  
@{EXPECTED_RESPRO_ADD_EN}
...     Add Research Project
...     Enter research project details
...     Project name    Project name
...     Start Date      
...     End Date        
...     Choose Scholarship        Choose Scholarship
...     Year of Submission (AD)   Year
...     Budget      Baht
#...     Responsible agency  Choose a Department
...     Project Details      
...     Status      
...     Responsible Person
...     Internal Project Responsible Person (Joint)
...     External Project Responsible Person (Joint)
...     Position or Prefix	Name	Last Name	
...     Position or Prefix   Name    Last Name
...     Submit     Cancel
@{EXPECTED_RESG_EN}
...    Research Group

...    No.	group name(Thai language)	Head	Member	Action
@{EXPECTED_RESPRO_VIEW_EN}
...    Research Projects Detail
...    Project Information
...    Project name
...    Project Start Date
...    Project End Date
...    Research Fund
...    Source
...    Amount
...    Project Details
...    Project Status
...    Project Lead
...    Project Members
@{EXPECTED_RESG_ADD_EN}
...    Create Research Group
...    Enter research group details
...    Research Group Name (Thai)
...    Research Group Name (English)
...    Research Group Description (Thai)
...    Research Group Description (English)
...    Research Group Details (Thai)
...    Research Group Details (English)
...    Image
...    Research Group Head
...    Research Group Members

@{EXPECTED_RESG_VIEW_EN}
...    Research Group Details
...    Research Group Information
...    Research Group Name (Thai)
...    Research Group Name (English)
...    Research Group Description (Thai)
...    Research Group Description (English)
...    Research Group Details (Thai)
...    Research Group Details (English)
...    Research Group Head
...    Research Group Members

@{EXPECTED_MAPU_EN}
...     Published research
...     No.	Title	Type	Publication year	Type
@{EXPECTED_BOOK_EN}
...     Book
...     No.	Name	Year	Publications	Page	Action
@{EXPECTED_OTHER_EN}
...     Other academic works (patents, petty patents, copyrights)
...     No.	Title	Type	Registration Date	Registration Number	Creator	Action
*** Keywords ***

Open Browser To Login Page
    Open Browser    ${LOGIN_URL}    ${BROWSER}
    Maximize Browser Window
    Wait Until Element Is Visible    ${LOGIN_PAGE_HEADER}    timeout=10s

Login As Teacher
    [Arguments]    ${username}    ${password}
    Input Text    ${USERNAME_FIELD}    ${username}
    Input Text    ${PASSWORD_FIELD}    ${password}
    Sleep    1s
    Click Element    ${LOGIN_BUTTON}
    Wait Until Element Is Visible    ${DASHBOARD_HEADER}    timeout=10s

Scroll Page Down
    ${total_height}=    Execute JavaScript    return document.body.scrollHeight
    ${scroll_position}=    Set Variable    0

    WHILE    ${scroll_position} < ${total_height}
        ${scroll_position}=    Evaluate    ${scroll_position} + 300
        Execute JavaScript    window.scrollTo(0, ${scroll_position})
        Sleep    0.5s
    END

Scroll Up
    Execute JavaScript    window.scrollTo(0, 0)

Wait Until Account Tab Is Loaded
    Click Element    ${ACCOUNT_TAB}
    Sleep    3s  # รอให้เนื้อหาโหลดเต็มที่
    Wait Until Element Is Visible    xpath=//div[@id='account' and contains(@class, 'show active')]    timeout=10s
    Wait Until Element Is Visible    ${ACCOUNT_TITLE}    timeout=10s


Change Language
    [Arguments]    ${language_button}
    Click Element    ${language_button}
    Sleep    3s

Go To User Profile
    Click Element    ${USER_PROFILE_MENU}

Logout
    Click Element    ${LOGOUT_BUTTON}
    Wait Until Element Is Visible    ${LOGIN_PAGE_HEADER}    timeout=10s

Verify Page Contains Multiple Texts
    [Arguments]    @{expected_texts}
    ${html_source}=    Get Source
    Log    HTML Source: ${html_source}
    FOR    ${text}    IN    @{expected_texts}
        Should Contain    ${html_source}    ${text}
    END


*** Test Cases ***

Test Teacher Update User Profile
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789
    Go To User Profile    
    Click Element    ${ACCOUNT_TAB}
    Sleep    2s
    Click Element    ${ACCOUNT_TAB}  
    Sleep    2s
    Change Language    ${LANG_TO_ENGLISH}
    Click Element    ${ACCOUNT_TAB}
    Sleep    2s
    Click Element    ${ACCOUNT_TAB}  
    Sleep    2s
    Verify Page Contains Multiple Texts    @{EXPECTED_Account_EN}
    Execute JavaScript    window.scrollTo(0,1000)
    Sleep    2s
    Scroll Up
    Sleep    2s
    Logout

Test Teacher Add Expertise
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789
    Go To User Profile    
    Click Element    ${EXPERTISE_TAB} 
    Sleep    2s
    Click Element    ${EXPERTISE_TAB}   
    Sleep    2s
    Change Language    ${LANG_TO_ENGLISH}
    Click Element    ${EXPERTISE_TAB} 
    Sleep    2s
    Click Element    ${EXPERTISE_TAB}   
    Sleep    2s
    Execute JavaScript    window.scrollTo(0,1000)    
    Sleep    2s
    Scroll Up
    Sleep    2s
    Verify Page Contains Multiple Texts    @{EXPECTED_EXPECTED_EN}   
    Logout

Test Teacher Navigate to Password Tab
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789
    Go To User Profile    
    Click Element    ${PASSWORD_TAB} 
    Sleep    2s
    Click Element    ${PASSWORD_TAB}   
    Sleep    2s
    Change Language    ${LANG_TO_ENGLISH}
    Click Element    ${PASSWORD_TAB} 
    Sleep    2s
    Click Element    ${PASSWORD_TAB}   
    Sleep    2s
    Verify Page Contains Multiple Texts    @{EXPECTED_Password_EN} 
    Sleep    2s
    Logout

Test Teacher Navigate to Education Tab
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789
    Go To User Profile    
    Click Element    ${EDUCATION_TAB} 
    Sleep    2s
    Click Element    ${EDUCATION_TAB}    
    Sleep    2s
    Change Language    ${LANG_TO_ENGLISH}
    Click Element    ${EDUCATION_TAB} 
    Sleep    2s
    Click Element    ${EDUCATION_TAB}    
    Sleep    2s
    Verify Page Contains Multiple Texts    @{EXPECTED_EDUCATION_EN}  
    Sleep    2s
    Logout


Test Management Fund
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789
    Go To User Profile    
    Click Element    ${FUND_TAB} 
    Sleep    2s
    # Click Element    ${FUND_TAB}     
    # Sleep    2s
    Change Language    ${LANG_TO_ENGLISH}
    # Click Element    ${FUND_TAB}  
    # Sleep    2s
    # Click Element    ${FUND_TAB}    
    # Sleep    2s
    Verify Page Contains Multiple Texts    @{EXPECTED_FUND_EN}  
    Sleep    2s
    Logout

Test Teacher Add Fund
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789
    Click Element    ${FUND_TAB}  
    Sleep    2s
    Change Language    ${LANG_TO_ENGLISH}
    Click Element    ${FUND_TAB}  
    Sleep    2s
    Click Element    ${FUND_ADD}
    Sleep    2s
    Verify Page Contains Multiple Texts    @{EXPECTED_FUND_ADD_EN}   
    Logout

Test Research Project
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789   
    Click Element    ${RESPRO_TAB}     
    Sleep    2s
    Change Language    ${LANG_TO_ENGLISH}
    Verify Page Contains Multiple Texts    @{EXPECTED_RESPRO_EN}  
    Sleep    2s
    Logout

Test Teacher Add ResearchProject
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789
    Click Element    ${RESPRO_TAB}  
    Sleep    2s
    Change Language    ${LANG_TO_ENGLISH}
    #Click Element     ${RESPRO_TAB}  
    Sleep    2s
    Click Element    ${RESPRO_ADD}
    Sleep    2s
    Execute JavaScript    window.scrollTo(0,1000)    
    Sleep    2s
    Scroll Up
    Sleep    2s
    Verify Page Contains Multiple Texts    @{EXPECTED_RESPRO_ADD_EN}   
    Logout

Test Teacher View ResearchProject
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789
    Click Element    ${RESPRO_TAB}  
    Sleep    2s
    Change Language    ${LANG_TO_ENGLISH}
    #Click Element     ${RESPRO_TAB}  
    Sleep    2s
    Click Element    ${RESPRO_VIEW}
    Sleep    2s
    Execute JavaScript    window.scrollTo(0,1000)    
    Sleep    2s
    Scroll Up
    Sleep    2s
    Verify Page Contains Multiple Texts    @{EXPECTED_RESPRO_VIEW_EN} 
    Logout  

Test Research Group
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789   
    Click Element    ${RESG_TAB}     
    Sleep    2s
    Change Language    ${LANG_TO_ENGLISH}
    Verify Page Contains Multiple Texts    @{EXPECTED_RESG_EN}  
    Sleep    2s
    Logout

Test Teacher Add Research Group
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789
    Click Element    ${RESG_TAB}  
    Sleep    2s
    Change Language    ${LANG_TO_ENGLISH}
    Sleep    2s
    Click Element    ${RESG_ADD}
    Sleep    2s
    Execute JavaScript    window.scrollTo(0,1000)    
    Sleep    2s
    Scroll Up
    Sleep    2s
    Verify Page Contains Multiple Texts    @{EXPECTED_RESG_ADD_EN}   
    Logout

Test Teacher View Research Group
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789
    Click Element    ${RESG_TAB}  
    Sleep    2s
    Change Language    ${LANG_TO_ENGLISH} 
    Sleep    2s
    Click Element    ${RESG_VIEW}
    Sleep    2s
    Execute JavaScript    window.scrollTo(0,1000)    
    Sleep    2s
    Scroll Up
    Sleep    2s
    Verify Page Contains Multiple Texts   @{EXPECTED_RESG_VIEW_EN}
    Logout 

Test Manage Publications paper
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789   
    
    Change Language    ${LANG_TO_ENGLISH}
    Click Element    ${MAPU_TAB}     
    Sleep    2s
    Click Element    ${PAPER_TAB}
    Sleep    2s
    Verify Page Contains Multiple Texts    @{EXPECTED_MAPU_EN}
    Sleep    2s
    Logout
 
Test Manage Publications book
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789   
    
    Change Language    ${LANG_TO_ENGLISH}
    Click Element    ${MAPU_TAB}     
    Sleep    2s
    Click Element    ${BOOK_TAB}
    Sleep    2s
    Verify Page Contains Multiple Texts    @{EXPECTED_BOOK_EN}
    Sleep    2s
    Logout
 
Test Manage Publications other
    Open Browser To Login Page
    Login As Teacher    chitsutha@kku.ac.th    123456789   
    
    Change Language    ${LANG_TO_ENGLISH}
    Click Element    ${MAPU_TAB}     
    Sleep    2s
    Click Element    ${OTHER_TAB}
    Sleep    2s
    Verify Page Contains Multiple Texts    @{EXPECTED_OTHER_EN}
    Sleep    2s
    Logout
 