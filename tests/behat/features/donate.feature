Feature: Donate.
 #@javascript
 Scenario: Donate link on every page 
  #Given I am an anonymous user
  Given I am at "home-page"
  Then I should see "Donate to edX"
 Scenario: Clicking on Donate link should take user to Donate page.
  When I click "Donate to edX"
  Then I should see "Donate Now"
 #Scenario: Clicking on Donate Now button should take user to MIT donation page.
  #When I click "Donate Now"
  #Then I should see "3860110"
