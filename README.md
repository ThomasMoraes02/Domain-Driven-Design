## Entidade

Entidade precisa ter uma identidade, um dominio do negócio

## Value Objects

Entidades possuem uma identidade única, enquanto Objetos de Valor são considerados iguais, se todos os seus atributos tiverem valor igual

## Named Constructors

Com named constructors, podemos saber a ordem dos parâmetros necessários diretamente no nome do método. Além disso, o nome deixa mais explícito quais dados estamos passando.

## Módulos

Pastas do sistema, organização por dominios da aplicação

## Arquiteturas

Arquitetura Hexagonal (Ports and Adapters):
- Camada externa: Infraestrutura, Web, Apps

Requisições que vem de fora através de ADAPTERS e enviar para PORTS até o centro do sistema

- Regra: Só deve ter dependências de fora para dentro.
- Regra: Aplicação não deve conhecer a infraestrutura.

Arquitetura Limpa:
Entidades (Business) --> Use Cases (Rules) --> Controllers - Gateways - Presenters (Interfaces) --> Ui - DB - Devices - Web (Frameworks and Drivers)

Do Projeto: 

Domínio -> Entidades, Value Objects, Factorys, Serviços

Aplicação -> Fluxo da aplicação, chamada de métodos

Infraestrutura -> Banco de Dados, Logs, Arquivos e Controllers

## Services

Uma classe que executa alguma ação que não pertence a nenhuma entidade ou VO


## Use Cases
Separar em uma classe especifica o fluxo da aplicação. Independente de qual tipo de aplicação: web, cli, api

Os termos Use Case, Application Service e Command Handler são basicamente sinônimos e servem para fornecer pontos de entrada na sua aplicação, de forma independente dos mecanismos de entrega (Web, CLI, etc).