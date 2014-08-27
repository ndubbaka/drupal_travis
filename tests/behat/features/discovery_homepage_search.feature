Feature: Discovery.
 #@javascript
 Scenario: Search sample 
  Given I am at "home-page"
  Given I enter "math" for "search_query"
  #Given I wait for "2000" millisec
  When I press the "edit-submit" button
  Then I should see "\"math\""
  Given I enter "science" for "search_query"
  #Given I wait for "2000" millisec
  When I press the "edit-submit" button
  Then I should see "\"science\""
  #Then I should not see the text "Archived"
  When I click "Current"
  #Given I wait for "2000" millisec
  #Then I should not see the link "Archived"
  Then I should not see the text "Archived"
  #Given I wait for "2000" millisec
  
