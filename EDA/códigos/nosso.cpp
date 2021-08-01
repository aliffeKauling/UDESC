#include <stdio.h>
#include <stdlib.h>
#include <ctype.h>

typedef struct No{
struct No* pai; //ponteiro para o nó pai
struct No* esquerda; //ponteiro para o nó filho a esquerda
struct No* direita; //ponteiro para o nó filho a direita
float v; //conteúdo de um nó arbitrário da árvore
} No;
typedef struct arvore {
No* raiz;
} Arvore;

Arvore* cria() {
Arvore *arvore;
arvore = malloc(sizeof(Arvore));
arvore->raiz = NULL;
return arvore;
}
//•Verifica se a árvore está vazia
int vazia(Arvore* arvore) {
return (arvore->raiz == NULL);
}

No* adiciona(Arvore* arvore, No* pai, float valor) {
No *no = malloc(sizeof(No));
no->pai = pai;
no->esquerda = NULL;
no->direita = NULL;
no->valor = valor;
if (pai == NULL)
arvore->raiz = no;
return no;
}


void remove(Arvore* arvore, No* no) {
if (no->esquerda != NULL)
remove(arvore, no->esquerda);
if (no->direita != NULL)
remove(arvore, no->direita);
if (no->pai == NULL) {
arvore->raiz == NULL;
} else {
if (no->pai->esquerda == no) {
no->pai->esquerda = NULL;
} else {
no->pai->direita = NULL;
}
}
free(no);
}


void percorrer(No* no) {
if (no != NULL) {
printf("%f", no->valor);
percorrer(no->esquerda);
percorrer(no->direita);
}
}

int main(){{

return 0;
}

