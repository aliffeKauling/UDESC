#include "stdio.h"
#include "stdlib.h"
#include "conio.h"

#define TAM 100
#define Logic int
#define TRUE 1
#define FALSE 0

// pegar chaves 10,5,20,1,3,4,8,30,40,35,50,45,55,51,100 e inserir (são 15 no total)

typedef struct No{
    int chave;
    int numero;
    int bal; // fator de balanceamento
    struct No *pai; // não sei se será útil
    struct No *pEsquerda;
    struct No *pDireita;
}No;

typedef struct Arvore{
No *raiz; // nó inicial (raiz)
} ARVORE;

ARVORE* inicializa(ARVORE* Arv);
No* inserir(ARVORE* arv, int valor, int chave, No *no, No *anterior, int *ok);
void exibirEmOrdem(No *Raiz);
void libera(No *Raiz);
//protótipo da função deletar ficaria aqui

main(){

Logic ok, h;
int i;   
int v[TAM];
ARVORE* Arv;

Arv = inicializa(Arv);



for(i = 0; i<TAM; i++){
v[i] = rand() % 20; // valores aleatórios
}

printf("\n-- INSERINDO --\n");

for(i = 0; i < TAM; i++){
if((i == 9)||(i == 4)||(i == 19)||(i == 0)||(i == 2)||(i == 3)||(i == 7)||(i == 29)||(i == 39)||(i == 34)||(i == 49)||(i == 44)||(i == 54)||(i == 50)||(i == 99)){
Arv->raiz = inserir(Arv, v[i], i+1, Arv->raiz, Arv->raiz, &ok);
}
}

printf("\n");
printf("\n---------------------------------------------");

printf("\n-- IMPRIMINDO APOS INSERIR --\n");

exibirEmOrdem(Arv->raiz);

printf("\n---------------------------------------------");

printf("\n-- DELETANDO --\n");

//deletar chaves 8, 30, 1 e 100

for(i = 0; i < TAM; i++){
if((i == 7)||(i == 29)||(i == 0)||(i == 99)){
printf("\n Nao Implementado Ainda");
//chamada da função deletar ficaria aqui, a chave para apagar que seria passada seria i+1
}
}

printf("\n---------------------------------------------");

printf("\n-- IMPRIMINDO APOS DELETAR --\n");

exibirEmOrdem(Arv->raiz);

libera(Arv->raiz);

_getch();

}

ARVORE* inicializa(ARVORE* Arv){   
Arv = (ARVORE*) malloc(sizeof(ARVORE));
Arv->raiz = NULL;
return Arv;
}

No* inserir(ARVORE* arv, int numero, int chave, No *no, No *anterior, Logic *ok){
No* esq; No* dir; //Ponteiros de Nós que auxiliam substituições futuras

if(no==NULL){
if(no == anterior) printf("\n Inserido: %d[id: %d] - Raiz", numero, chave);
else if(numero < anterior->numero) printf("\n Inserido: %d[id: %d] - Ao lado esquerdo de %d[id: %d]", numero, chave, anterior->numero, anterior->chave);
else printf("\n Inserido: %d[id: %d] - Ao lado direito de %d[id: %d]", numero, chave, anterior->numero, anterior->chave);
no = (No*) malloc(sizeof(No));
no->chave = chave;
no->numero = numero;
no->pEsquerda = NULL;
no->pDireita = NULL;
no->pai = anterior;
no->bal = 0;
*ok = TRUE;
return (no);
}

if(((numero == no->numero)&&(chave < no->chave))||(numero < no->numero)){
no->pEsquerda = inserir(arv, numero, chave, no->pEsquerda, no, ok);
if(*ok==TRUE){
switch(no->bal){
case -1: no->bal = 0; *ok = FALSE; break;
case 0: no->bal = 1; break;
case 1: esq = no->pEsquerda;
if(esq->bal == 1){
printf("\n Utilizada Rotacao Esquerda-Esquerda para Balancear");
no->pEsquerda= esq->pDireita;
esq->pDireita = no;
no->bal = 0;
esq->bal=0;
no = esq;
}else{
printf("\n Utilizada Rotacao Esquerda-Direita para Balancear");
dir = esq->pDireita;
esq->pDireita = dir->pEsquerda;
dir->pEsquerda = esq;
no->pEsquerda = dir->pDireita;
dir->pDireita = no;
if(dir->bal == 1) no->bal = -1;
else no->bal = 0;
if(dir->bal == -1) esq->bal = 1;
else esq->bal = 0;
dir->bal=0;
no=dir;
} *ok = FALSE;
}}}

if(((numero == no->numero)&&(chave > no->chave))||(numero > no->numero)){
no->pDireita = inserir(arv, numero, chave, no->pDireita, no, ok);
if(*ok==TRUE){
switch(no->bal){
case 1: no->bal = 0; *ok = FALSE; break;
case 0: no->bal = -1; break;
case -1: esq = no->pDireita;
if(esq->bal == -1){
printf("\n Utilizada Rotacao Direita-Direita para Balancear");
no->pDireita= esq->pEsquerda;
esq->pEsquerda = no;
no->bal = 0;
esq->bal=0;
no = esq;
}else{
printf("\n Utilizada Rotacao Direita-Esquerda para Balancear");
dir = esq->pEsquerda;
esq->pEsquerda = dir->pDireita;
dir->pDireita = esq;
no->pDireita = dir->pEsquerda;
dir->pEsquerda = no;
if(dir->bal == -1) no->bal = 1;
else no->bal = 0;
if(dir->bal == 1) esq->bal = -1;
else esq->bal = 0;
dir->bal=0;
no = dir;
} *ok = FALSE;
}}}
return(no);
}

void exibirEmOrdem(No *Raiz){
if(Raiz != NULL){
if(Raiz->pEsquerda != NULL) exibirEmOrdem(Raiz->pEsquerda);
printf("\n %d[id: %i] - balamento: %d", Raiz->numero, Raiz->chave, Raiz->bal);
if(Raiz->pDireita != NULL) exibirEmOrdem(Raiz->pDireita);
}else{
printf("\n Nulo");
}
}

//função deletar ficaria aqui

void libera(No *Raiz){
if (Raiz != NULL){
libera(Raiz->pEsquerda);
libera(Raiz->pDireita);
free(Raiz);
}
}
