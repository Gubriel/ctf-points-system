<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>CTF Challenges</title>

<link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">

<style>

/* =========================
RESET
========================= */

*{
margin:0;
padding:0;
box-sizing:border-box;
}

/* =========================
BASE
========================= */

body{
background:#050505;
color:#00ff9c;
font-family:'Share Tech Mono', monospace;
overflow:hidden;
}

/* scanlines */

body::after{
content:"";
position:fixed;
top:0;
left:0;
width:100%;
height:100%;

background:
repeating-linear-gradient(
0deg,
rgba(0,255,65,0.05),
rgba(0,255,65,0.05) 1px,
transparent 1px,
transparent 3px
);

pointer-events:none;
}

/* ruído */

body::before{
content:"";
position:fixed;
top:0;
left:0;
width:100%;
height:100%;

background-image:
linear-gradient(rgba(0,255,100,0.04) 1px, transparent 1px);

background-size:100% 3px;

animation:noise 0.3s infinite;
pointer-events:none;
}

@keyframes noise{
0%{transform:translateY(0)}
100%{transform:translateY(3px)}
}

/* =========================
LAYOUT
========================= */

.container{

width:100%;
height:100vh;

display:flex;
flex-direction:column;
align-items:center;
justify-content:center;

padding:40px;
}

/* =========================
LOGO
========================= */

.logo{
position:relative;
margin-bottom:40px;
}

.logo img{
max-width:600px;

animation:
glitchMove 3s infinite,
glowPulse 2s infinite alternate;
}

@keyframes glowPulse{

from{
filter:
drop-shadow(0 0 5px #00ff41)
drop-shadow(0 0 10px #00ff41);
}

to{
filter:
drop-shadow(0 0 15px #00ff41)
drop-shadow(0 0 35px #00ff41);
}

}

@keyframes glitchMove{

0%{transform:translate(0,0)}
20%{transform:translate(-1px,1px)}
40%{transform:translate(1px,-1px)}
60%{transform:translate(-1px,0)}
80%{transform:translate(1px,1px)}
100%{transform:translate(0,0)}

}

/* =========================
PAINEL DESAFIOS
========================= */

.challenges-frame{

position:relative;

padding:4px;

border:1px solid #00ff41;

box-shadow:
0 0 10px #00ff41,
0 0 30px #00ff41;

animation:framePulse 2s infinite alternate;

}

/* brilho */

@keyframes framePulse{

from{
box-shadow:
0 0 5px #00ff41,
0 0 15px #00ff41;
}

to{
box-shadow:
0 0 15px #00ff41,
0 0 45px #00ff41;
}

}

/* glitch moldura */

.challenges-frame::before,
.challenges-frame::after{

content:"";

position:absolute;
top:0;
left:0;

width:100%;
height:100%;

border:1px solid #00ff41;

opacity:0.4;

}

.challenges-frame::before{
transform:translate(2px,-2px);
animation:frameGlitch 2s infinite;
}

.challenges-frame::after{
transform:translate(-2px,2px);
animation:frameGlitch 1.5s infinite;
}

@keyframes frameGlitch{

0%{clip-path: inset(0 0 90% 0);}
25%{clip-path: inset(20% 0 60% 0);}
50%{clip-path: inset(40% 0 40% 0);}
75%{clip-path: inset(60% 0 20% 0);}
100%{clip-path: inset(0 0 90% 0);}

}

/* =========================
LISTA DE DESAFIOS
========================= */

.challenges{

width:900px;

padding:20px;

background:rgba(0,20,0,0.2);

backdrop-filter:blur(4px);

animation:panelShake 4s infinite;

}

@keyframes panelShake{

0%{transform:translate(0,0)}
25%{transform:translate(1px,-1px)}
50%{transform:translate(-1px,1px)}
75%{transform:translate(1px,1px)}
100%{transform:translate(0,0)}

}

/* linha */

.challenge{

display:flex;

justify-content:space-between;

padding:12px;

border-bottom:1px solid rgba(0,255,65,0.15);

transition:0.2s;
}

.challenge:hover{

background:rgba(0,255,65,0.08);
transform:translateX(4px);

}

/* colunas */

.name{flex:2}
.category{flex:1}
.points{width:100px;text-align:right}
.difficulty{width:120px;text-align:center}
.status{width:120px;text-align:right}

/* status */

.solved{
color:#00ff41;
text-shadow:0 0 8px #00ff41;
}

.locked{
color:#006b3f;
}

/* footer */

.footer{
position:absolute;
bottom:15px;
font-size:12px;
opacity:0.5;
letter-spacing:2px;
}

</style>
</head>

<body>

<div class="container">

<div class="logo">
<img src="{{ asset('images/logo.png') }}" alt="CTF">
</div>

<div class="challenges-frame">

<div class="challenges">

<div class="challenge">
<div class="name">Hidden in Plain Sight</div>
<div class="category">Steganography</div>
<div class="difficulty">Easy</div>
<div class="points">100</div>
<div class="status solved">Solved</div>
</div>

<div class="challenge">
<div class="name">Packet Phantom</div>
<div class="category">Forensics</div>
<div class="difficulty">Medium</div>
<div class="points">250</div>
<div class="status">Open</div>
</div>

<div class="challenge">
<div class="name">Forgotten Cipher</div>
<div class="category">Crypto</div>
<div class="difficulty">Medium</div>
<div class="points">300</div>
<div class="status">Open</div>
</div>

<div class="challenge">
<div class="name">Ghost in the Shell</div>
<div class="category">Pwn</div>
<div class="difficulty">Hard</div>
<div class="points">500</div>
<div class="status locked">Locked</div>
</div>

<div class="challenge">
<div class="name">Admin's Mistake</div>
<div class="category">Web</div>
<div class="difficulty">Hard</div>
<div class="points">450</div>
<div class="status">Open</div>
</div>

</div>

</div>

<div class="footer">
CHALLENGE BOARD • CAPTURE THE FLAG
</div>

</div>

</body>
</html>
<script>
// setTimeout(function(){

//     const pages = [
//         "/",
//         "/prblms"
//     ];

//     const current = window.location.pathname;

//     const next = pages[(pages.indexOf(current) + 1) % pages.length];

//     window.location.href = next;

// }, 10000);
// </script>
