
const caixa_de_mensagens = document.getElementsByClassName('msg_card_body')[0]
let mensgn_count = document.getElementById('qtd_mensgns')
const texto_mensagem = document.getElementsByTagName("textarea")[0]
const selecionado = document.getElementById('selecionado')
let comprovativo = document.getElementById("comprovativo")
function carregar_mensagens(id, cliente)
{//fetch senders and messages data

    selecionado.textContent = cliente
  
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

        if(this.readyState == 4 && this.status == 200){
            esvaziar_caixa_mensagem()
            var mensagens = JSON.parse(this.responseText)
            for( i in mensagens){
                if(mensagens[i].saida == 1){
                    
                    carregar_mensagem_outro(mensagens[i])
                }else{
                 
                    carregar_mensagem_minha(mensagens[i])
                }
          
            }
            let qtd =  caixa_de_mensagens.children.length 
            if(qtd == 1)
                mensgn_count.textContent = qtd + ' mensagem'
            else
                mensgn_count.textContent = qtd + ' mensagens'
        }
    };
    xmlhttp.open("GET", "carregar_mensagens.php?i="+id, true);
    xmlhttp.send();

}
function carregar_mensagem_outro(obj)
{// <!--mensagem do outro-->
    var div0 = document.createElement('div')
    div0.classList.add('d-flex')
    div0.classList.add('justify-content-start')
    div0.classList.add('mb-4')

    var div01 = document.createElement('div')
    div01.classList.add('img_cont_msg')
    
    var img0 = document.createElement('img')
    img0.src = "images/avatarprofile.png"
    img0.classList.add('rounded-circle')
    img0.classList.add('user_img_msg')
    div01.appendChild(img0)

    div0.appendChild(div01)

    var div02 = document.createElement('div')
    div02.classList.add('msg_cotainer')





    if( obj.mensagem.slice(0,14) == 'comprovativos/')
    {

        var imgm = document.createElement('img')
        imgm.src = obj.mensagem
        imgm.style.height = '100px'
        imgm.style.width = '200px'
        imgm.style.borderRadius = '25px'
        imgm.onclick = function (){
            if (RunPrefixMethod(document, "FullScreen") || RunPrefixMethod(document, "IsFullScreen")) {
                RunPrefixMethod(document, "CancelFullScreen");
            }
            else {
                RunPrefixMethod(e, "RequestFullScreen");
            }
        }
        div02.appendChild(imgm)


    }else{
        var mensgm = document.createTextNode(obj.mensagem)
        div02.appendChild(mensgm)

    }
    // var mensgm = document.createTextNode(obj.mensagem)
    // div02.appendChild(mensgm)

    var span0 = document.createElement('span')
    span0.classList.add('msg_time')

    var data = document.createTextNode(obj.data)
    span0.appendChild(data)

    div02.appendChild(span0)

    div0.appendChild(div02)

    caixa_de_mensagens.appendChild(div0)

}
function carregar_mensagem_minha(obj)
{ // echo '<!--Minha mensagem-->

    var div0 = document.createElement('div')
    div0.classList.add('d-flex')
    div0.classList.add('justify-content-end')
    div0.classList.add('mb-4')

    var div01 = document.createElement('div')
    div01.classList.add('msg_cotainer_send')
    
    if( obj.mensagem.slice(0,14) == 'comprovativos/')
    {

        var imgm = document.createElement('img')
        imgm.src = obj.mensagem
        imgm.style.height = '100px'
        imgm.style.width = '200px'
        imgm.style.borderRadius = '25px'
        imgm.onclick = function (){
            if (RunPrefixMethod(document, "FullScreen") || RunPrefixMethod(document, "IsFullScreen")) {
                RunPrefixMethod(document, "CancelFullScreen");
            }
            else {
                RunPrefixMethod(e, "RequestFullScreen");
            }
        }
        div01.appendChild(imgm)


    }else{
        var mensgm = document.createTextNode(obj.mensagem)
        div01.appendChild(mensgm)

    }

    var span0 = document.createElement('span')
    span0.classList.add('msg_time_send')

    var data = document.createTextNode(obj.data)
    span0.appendChild(data)

    div01.appendChild(span0)
    
    var img0 = document.createElement('img')
    img0.src = "images/user2.png"
    img0.classList.add('rounded-circle')
    img0.classList.add('user_img_msg')
    
    div0.appendChild(div01)

    var div02 = document.createElement('div')
    div02.classList.add('img_cont_msg')
    div02.appendChild(img0)
    
    div0.appendChild(div02)

    caixa_de_mensagens.appendChild(div0)
}
function esvaziar_caixa_mensagem()
{
    while(caixa_de_mensagens.hasChildNodes()) 
        caixa_de_mensagens.children[0].remove()
}

function enviar_mensagem(corretor)
{//Enviar mensagem para o cliente e recarregar mensagens
    let cliente = selecionado.textContent
    let mensagem = texto_mensagem.value

    if( mensagem.length != 0  && mensagem.replace(/\s/g, '').length != 0)
    {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){

            }
        };
        xmlhttp.open("GET", "enviar_mensagem.php?cliente="+cliente+"&corretor="+corretor+"&mensagem="+mensagem)
        xmlhttp.send();
        //Recarregando as mensagens
        carregar_mensagens(corretor, cliente)
        texto_mensagem.value = ''
    }
    if(comprovativo.value !== '')
    {
        const files = document.querySelector('[name=file]').files
        const formData = new FormData()

        formData.append('comprovativo', files[0])
        formData.append('cliente', cliente)
        formData.append('corretor', corretor)


        let post_foto = "postar_foto.php"
        const xhr = new XMLHttpRequest()
        xhr.responseType = 'json'

        xhr.onload = () => {
            console.log(xhr.response)
        }
        xhr.open('POST', post_foto)
        xhr.send(formData)

    }

}
function selecionar_foto()
{//selecionar imagem e preparar para upload

    comprovativo.click()


}