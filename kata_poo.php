<?php


use earth\Human;
use earth\Man;
use earth\Woman;

spl_autoload_register( function (string $className) {
    include str_replace( '\\',  DIRECTORY_SEPARATOR, $className) . '.php';
});
function testInstancier()
{
    $marcelline = new Human();
    $constance = new Human();
    assert( $marcelline->height == 175);
    assert( $constance->height == 175);
    assert(property_exists( 'earth\Human',  'lastName'));
    unset($constance);
}

function testMethodo()
{
    $human = new Human();
    assert( $human->iAmWalking() == 'Je marche.');
    assert( $human->myHeight() == 176);
    $human2 = new Human();
    $human2->height = 180;
    assert( $human2->iAmWalking() == 'Je marche.');
    assert($human2->myHeight() == 181);
}

function testVieEtMort()
{
    $constance = new Human();
    unset($constance);

}

function testParam()
{
    $constance = new Human("Durant");
    $marcelline = new Human("Dupont");
    assert( $marcelline->lastName == "Dupont");
    assert( $constance->lastName == "Durant");

}

function testSecret()
{
    $agent = new Human( '007');
    $agent->setSecret('permis de ****');
    assert(property_exists($agent,  'secret'));
    assert( $agent->getSecret() == 'permis de ****');
}

function testGenre()
{
    $marcelline = new Woman();
    $adam = new Man( 'depomme');

    assert( $adam->iAmWalking() == 'Je marche.');
    assert( $adam instanceof Human);
    assert( $adam instanceof Man);
    assert( ($adam instanceof Woman) == false);

}

function testForce()
{
    $marcelline = new Woman( 'marcelline');
    $adam = new Man();
    assert( $adam->force === 2);
    assert( $marcelline->force === 1);
}

function testEnfanter()
{
    $marcelline = new Woman( 'marcelline');
    $adam = new Man();
    assert( $marcelline->enfanter() == 'oui je peux enfanter!');
    assert( $marcelline->lastName == 'marcelline');
}

function testStatique()
{
    assert( Human::$population == 0);
    $woman = new Woman();
    assert( Human::$population == 1);
    $man = new Man();
    assert( Human::$population == 2);
    unset($man);
    assert( Human::$population == 1);

}

function testTraitInterface()
{
    $marcelline = new Woman( 'Bernard');
    $adam = new Man();
    assert( $marcelline->run() == "i'm running");
    assert( $marcelline->hairiness() == 'j\'ai des poils');
    assert( $adam->hairiness() == 'j\'ai tout pleins des poils di partout');
}

$test = new TestSuite();
$test->run( 'testMethodo');
$test->run( 'testInstancier');
$test->run( 'testVieEtMort');
$test->run( 'testParam');
$test->run( 'testSecret');
$test->run( 'testGenre');
$test->run( 'testForce');
$test->run( 'testEnfanter');
$test->run( 'testStatique');
$test->run( 'testTraitInterface');
$test->summarize();