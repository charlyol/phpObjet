```mermaid
classDiagram
    class Human {
        + height
        + lastName
        - secret
--construct($name='')
        walking()
        myweight()
        setSecret()
        getSecret()
    }
class Woman{
    enfanter()
}

Human <|-- Woman
Human <|-- Man


```