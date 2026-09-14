## 📱 Desafio 1: Celular e Bateria

### 💡 A Ideia
Um celular não funciona sozinho, ele precisa ter uma bateria colocada dentro dele para ter energia.

### 📋 O que você deve fazer:

#### Passo 1: Criar a classe `Bateria` (a peça menor)
* Crie o atributo para guardar a carga da bateria (ex: começa em `100`%).
* Crie uma função chamada `gastarEnergia()` que diminua a carga em `10%` toda vez que for chamada.
* Crie uma função chamada `getCarga()` para poder ler quanto de bateria ainda resta.

#### Passo 2: Criar a classe `Celular` (a peça que usa a bateria)
* Crie o atributo para guardar a marca do aparelho (ex: `"Samsung"`).
* O celular deve ter um atributo do tipo **`Bateria`**.
* O construtor do celular deve receber a marca e o objeto da bateria já pronto.
* Crie uma função chamada `jogarJogo()` ("apenas uma funcao simples que exiba uma mensagem")  na tela e mande a bateria gastar energia (chamar o metodo que gastaEnergia).

#### 🧪 O Teste Final:
1. Crie um objeto da classe `Bateria`.
2. Crie um objeto da classe `Celular`, passando essa bateria para dentro dele.
3. Chame a função `jogarJogo()` duas vezes e exiba na tela quanto de bateria ainda sobrou.