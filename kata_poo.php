<?php
spl_autoload_register(function (string $classeName) {
    include $classeName . '.php';
});
function testInstancier()
{
    $marcelline = new Human();
    $constance = new Human();
    assert(assertion: $marcelline->height == 175);
    assert(assertion: $constance->height == 175);
    assert(property_exists(object_or_class: 'Human', property: 'lastName'));
    unset($constance);
}

function testMethodo()
{
    $human = new Human();
    assert(assertion: $human->iAmWalking() == 'Je marche.');
    assert(assertion: $human->myHeight() == 176);
    $human2 = new Human();
    $human2->height = 180;
    assert(assertion: $human2->iAmWalking() == 'Je marche.');
    assert(assertion: $human2->myHeight() == 181);
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
    assert(assertion: $marcelline->lastName == "Dupont");
    assert(assertion: $constance->lastName == "Durant");

}

function testSecret()
{
    $agent = new Human(name: '007');
    $agent->setSecret('permis de ****');
    assert(property_exists($agent, property: 'secret'));
    assert(assertion: $agent->getSecret() == 'permis de ****');
}

function testGenre()
{
    $marcelline = new Woman();
    $adam = new Man(name: 'depomme');

    assert(assertion: $adam->iAmWalking() == 'Je marche.');
    assert(assertion: $adam instanceof Human);
    assert(assertion: $adam instanceof Man);
    assert(assertion: ($adam instanceof Woman) == false);

}

function testForce()
{
    $marcelline = new Woman(name: 'marcelline');
    $adam = new Man();
    assert(assertion: $adam->force === 2);
    assert(assertion: $marcelline->force === 1);
}

function testEnfanter()
{
    $marcelline = new Woman(name: 'marcelline');
    $adam = new Man();
    assert(assertion: $marcelline->enfanter() == 'oui je peux enfanter!');
    assert(assertion: $marcelline->lastName == 'marcelline');
}

function testStatique()
{
    assert(assertion: Human::$population == 0);
    $woman = new Woman();
    assert(assertion: Human::$population == 1);
    $man = new Man();
    assert(assertion: Human::$population == 2);
    unset($man);
    assert(assertion: Human::$population == 1);

}

function testTraitInterface()
{
    $marcelline = new Woman(name: 'Bernard');
    $adam = new Man();
    assert(assertion: $marcelline->courir() == "i'm running");
    assert(assertion: $marcelline->hairiness() == 'j\'ai des poils');
    assert(assertion: $adam->hairiness() == 'j\'ai tout pleins des poils di partout');
}

$test = new TestSuite();
$test->run(functionName: 'testInstancier');
$test->run(functionName: 'testMethodo');
$test->run(functionName: 'testVieEtMort');
$test->run(functionName: 'testParam');
$test->run(functionName: 'testSecret');
$test->run(functionName: 'testGenre');
$test->run(functionName: 'testForce');
$test->run(functionName: 'testEnfanter');
$test->run(functionName: 'testStatique');
$test->run(functionName: 'testTraitInterface');
$test->summarize();