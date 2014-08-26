<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
//class FeatureContext extends BehatContext
class FeatureContext extends Drupal\DrupalExtension\Context\DrupalContext
{
    /**
     * Initializes context.
     * Every scenario gets its own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }
    
    /**
     * @Given /^I wait for "([^"]*)" millisec$/
     */
    public function iWaitForMillisec($millisec) {
      //usleep(100000);
      try {
        $this->getSession()->wait($millisec);
      }
      catch (Exception $e) {
        echo $e->getMessage();
      }
    }
    
    /**
     * @Given /^I am logged in on "([^"]*)" with username "([^"]*)" and password "([^"]*)"$/
     */
    public function iAmLoggedInOnWithUsernameAndPassword($arg1, $arg2, $arg3)
    {
      $this->getSession()->visit($this->locatePath($arg1.'/user'));
      $element = $this->getSession()->getPage();
      $element->fillField('Username', $arg2);
      $element->fillField('Password', $arg3);
      $submit = $element->findButton('Log in');
      if (empty($submit)) {
        throw new \Exception(sprintf("No submit button at %s", $this->getSession()->getCurrentUrl()));
      }
  
      // Log in.
      $submit->click();
    }

//
// Place your definition and hook methods here:
//
//    /**
//     * @Given /^I have done something with "([^"]*)"$/
//     */
//    public function iHaveDoneSomethingWith($argument)
//    {
//        doSomethingWith($argument);
//    }
//
}
