#include"stdio.h"
#include"stdlib.h"


struct arvore{
    int v;
    int bal;
    struct arvore *pai;
    struct arvore *filhoEsq;
    struct arvore *filhoDir;
};

int altura(struct arvore *no){
    int filhoEsq, filhoDir;

    if(no==NULL){
        return -1;
    }
    filhoEsq=altura(no->filhoEsq);
    filhoDir=altura(no->filhoDir);
    if(filhoEsq>filhoDir){
        return filhoEsq+1;
    }else{
        return filhoDir+1;
    }
};


struct arvore *rse(struct arvore *p){
    struct arvore *q;

    q=p->filhoEsq;
    p->filhoEsq=q->filhoDir;
    if(q->filhoDir!=NULL){
        q->filhoDir->pai=p;
    }
    q->filhoDir=p;
    q->pai=p->pai;
    if(p->pai!=NULL){
        if(p->pai->filhoEsq==p){
            p->pai->filhoEsq=q;
        }else{
            p->pai->filhoDir=q;
        }
    }
    p->pai=q;
    q->bal=altura(q->filhoEsq)-altura(q->filhoDir);
    p->bal=altura(p->filhoEsq)-altura(p->filhoDir);

    return q;
};


struct arvore *rsd(struct arvore *p){
    struct arvore *q;
    q=p->filhoDir;
    p->filhoDir=q->filhoEsq;
    if(q->filhoEsq!=NULL){
        q->filhoEsq->pai=p;
    }
    q->filhoEsq=p;
    q->pai=p->pai;
    if(p->pai!=NULL){
        if(p->pai->filhoEsq==p){
            p->pai->filhoEsq=q;
        }else{
            p->pai->filhoDir=q;
        }
    }
    p->pai=q;

    q->bal=altura(q->filhoEsq)-altura(q->filhoDir);
    p->bal=altura(p->filhoDir)-altura(p->filhoDir);

    return q;
};


void inserir(struct arvore **pRaiz,struct arvore **PAI, int numero)
{
    if(*pRaiz == NULL)
    {
        *pRaiz = (struct arvore *) malloc(sizeof(struct arvore));
        (*pRaiz)->filhoEsq = NULL;
        (*pRaiz)->filhoDir = NULL;
        (*pRaiz)->v = numero;
        (*pRaiz)->pai=(*PAI);
        (*pRaiz)->bal=0;
    }
    else
    {
        if(numero <(*pRaiz)->v)
        {
            inserir(& (*pRaiz)->filhoEsq,& (*pRaiz), numero);
            (*pRaiz)->bal=altura ( (*pRaiz)->filhoEsq) - altura ( (*pRaiz)->filhoDir );
            if( (*pRaiz)->bal==2)
            {
                if((*pRaiz)->filhoEsq->bal==1){
                    (*pRaiz)= rse((*pRaiz));
                }
                else if(  (*pRaiz)->filhoEsq->bal==-1)
                {
                    (*pRaiz)->filhoEsq=rsd((*pRaiz)->filhoEsq);
                    (*pRaiz)= rse((*pRaiz));
                }
            }

        }
        else
        {
            if(numero >(*pRaiz)->v)
            {
                inserir(& (*pRaiz)->filhoDir,& (*pRaiz), numero);
                (*pRaiz)->bal=altura ( (*pRaiz)->filhoEsq ) - altura ( (*pRaiz)->filhoDir );
                if( (*pRaiz)->bal==-2)
                {
                    if(  (*pRaiz)->filhoDir->bal==-1)
                        (*pRaiz)= rsd((*pRaiz));
                    else if(  (*pRaiz)->filhoDir->bal==1)
                    {
                        (*pRaiz)->filhoDir=rse((*pRaiz)->filhoDir);
                        (*pRaiz)= rsd((*pRaiz));
                    }
                }
            }

        }
    }
}

void preordena(struct arvore *raiz)
{
    if (raiz!=NULL){
    printf("%d ",raiz->v);
    preordena(raiz->filhoEsq);
    preordena(raiz->filhoDir);
    }
}


void exibir(struct arvore *Tree,int Level)
{
    int i;
    if (!Tree) return ;

    exibir(Tree->filhoDir, Level+1);
    printf("\n");
        for (i = 0; i < Level; i++)
            printf("   ");
    printf("%d",Tree->v);
    exibir(Tree->filhoEsq, Level+1);
}

int main(){
    struct arvore *L,*aux;
    int x=0, opcao;
    L=aux=NULL;
    

 do{
        printf("\nInforme o Número: ");
        setbuf(stdin,NULL);
        scanf("%d",&x);

        inserir(&L,&aux,x);

        printf("\nMais dados? S/N:  ");
        setbuf(stdin,NULL);
        scanf("%c",&opcao);
    }while(opcao!='N');

    exibir(L,1);
    printf("\n--------------------\n");

return(0);
}
