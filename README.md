# Super Kart Racing PRO Advanced Simulator

O simulador deve englobar:

* CRUD de Karts (implementado);
* CRUD de Corridas (implementado);
* Simulação de Corridas (parcialmente implementado);

Todas as funcionalidades já estão prototipadas e algumas implementadas.

## Ambiente de desenvolvimento

Para facilitar o desenvolvimento será utilizada uma [Vagrant](http://www.vagrantup.com) box.
Dentro da pasta basta rodar:

    $ vagrant up

## Requisitos

### Usabilidade

* Em todos os CRUDs deve ser executada uma confirmação (confirm() do JS) ao clicar no botão “Excluir”;
* No CRUD de corridas, deve ser incluído um campo para informar o kartódromo sede da corrida (texto simples). O campo deverá ser exibido tanto nos formulários, quanto na listagem.

### Lógica de negócio

Com relação à lógica de negócio, existem testes unitários que devem servir de guia para implementação dos requisitos descritos abaixo. Para executar, basta acessar a pasta `module/Application/tests` e rodar o comando `phpunit`. Os requisitos são:

* Deve haver uma função para simular as novas corridas, ou seja, corridas já simuladas não podem ser simuladas novamente.
* A simulação de uma corrida deve consistir em estabelecer a posição final que cada kart “terminou” a corrida, e computar a melhor volta de cada um. Tanto a posição, quanto a melhor volta podem ser estabelecidas de forma randômica, apenas respeitando a regra de que o kart com a pior volta deve ser no máximo 15 segundos mais lento que o kart com a melhor volta, e dois karts não podem ter a mesma posição, ou seja, não pode haver empate. Para facilitar a implementação considere que a melhor volta nunca terá um tempo menor que 2 minutos, e cada kart fará apenas uma volta, ou seja, a melhor volta de um kart é a única volta que ele fez.
* Ao simular uma corrida novamente os karts devem manter as posições da simulação anterior.

Atenção, as telas de simulação não são necessárias, apenas o desenvolvimento das funcções. Ou seja, se os testes rodarem essa etapa estará concluída.
### Demais aspectos

* Padrão de codificação PSR-2
* Boas práticas no gitflow
* Boas praticas de codificação: reutilização de código, baixo acoplamento e alta coesão
