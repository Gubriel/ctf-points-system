<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>CTF Championship</title>
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
            BASE DA PÁGINA
            ========================= */
            body{
                background:#050505;
                color:#00ff9c;
                font-family:'Share Tech Mono', monospace;
                overflow:hidden;
            }
            /* =========================
            EFEITO CRT / SCANLINES
            ========================= */
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
            /* =========================
            RUÍDO DIGITAL
            ========================= */
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
                pointer-events:none;
                animation:noise 0.3s infinite;
            }

            @keyframes noise{
                0%{transform:translateY(0)}
                100%{transform:translateY(3px)}
            }
            /* =========================
            CONTAINER PRINCIPAL
            ========================= */
            .container{
                width:100%;
                height:100vh;
                display:flex;
                flex-direction:column;
                justify-content:center;
                align-items:center;
                padding:40px;
            }
            /* =========================
            LOGO CYBER COM GLITCH
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
            /* brilho neon */
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
            /* micro tremor hacker */
            @keyframes glitchMove{
                0%{transform:translate(0,0)}
                20%{transform:translate(-1px,1px)}
                40%{transform:translate(1px,-1px)}
                60%{transform:translate(-1px,0)}
                80%{transform:translate(1px,1px)}
                100%{transform:translate(0,0)}
            }
            /* camadas glitch da logo */
            .logo::before,
            .logo::after{
                content:"";
                position:absolute;
                top:0;
                left:0;
                width:100%;
                height:100%;

                background:url("/images/logo.png");
                background-size:contain;
                background-repeat:no-repeat;

                mix-blend-mode:screen;
                opacity:0.5;
            }
            /* glitch verde */
            .logo::before{
                left:3px;
                animation:glitchLayer 2s infinite;
                filter:hue-rotate(90deg);
            }
            /* glitch digital */
            .logo::after{
                left:-3px;
                animation:glitchLayer 1.5s infinite;
                filter:brightness(2);
            }

            @keyframes glitchLayer{
                0%{clip-path: inset(0 0 90% 0);}
                20%{clip-path: inset(10% 0 60% 0);}
                40%{clip-path: inset(40% 0 40% 0);}
                60%{clip-path: inset(60% 0 20% 0);}
                80%{clip-path: inset(80% 0 5% 0);}
                100%{clip-path: inset(0 0 90% 0);}
            }
            /* =========================
            MOLDURA DO PLACAR
            ========================= */
            .scoreboard-frame{
                position:relative;
                padding:4px;
                border:1px solid #00ff41;

                box-shadow:
                0 0 10px #00ff41,
                0 0 30px #00ff41;

                animation:framePulse 2s infinite alternate;
            }
            /* brilho pulsante */
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

            /* glitch da moldura */
            .scoreboard-frame::before,
            .scoreboard-frame::after{
                content:"";
                position:absolute;
                left:0;
                top:0;
                width:100%;
                height:100%;
                border:1px solid #00ff41;
                opacity:0.4;
                pointer-events:none;
            }
            .scoreboard-frame::before{
                transform:translate(2px,-2px);
                animation:frameGlitch 2s infinite;
            }

            .scoreboard-frame::after{
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
            PLACA DO SCORE
            ========================= */
            .scoreboard{
                width:700px;
                padding:20px;
                background:rgba(0,20,0,0.2);
                backdrop-filter:blur(4px);
                animation:panelShake 4s infinite;
            }
                /* tremor leve */
                @keyframes panelShake{
                0%{transform:translate(0,0)}
                25%{transform:translate(1px,-1px)}
                50%{transform:translate(-1px,1px)}
                75%{transform:translate(1px,1px)}
                100%{transform:translate(0,0)}
            }
            /* =========================
            LINHAS DO RANKING
            ========================= */
            .row{
                display:flex;
                justify-content:space-between;
                padding:10px;
                border-bottom:1px solid rgba(0,255,65,0.15);
                transition:0.2s;
            }
            .row:hover{
                background:rgba(0,255,65,0.08);
                transform:translateX(4px);
            }
            .rank{width:60px;}
            .team{flex:1;}
            .points{width:120px;text-align:right;}
            /* =========================
            TOP 3
            ========================= */
            .first{
                color:#00ff41;
                font-size:20px;
                text-shadow:0 0 10px #00ff41;
            }
            .second{color:#00e676;}
            .third{color:#00c853;}
            /* =========================
            FOOTER
            ========================= */
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
        <div id="screen-scoreboard" class="screen active">
            <div class="container">

                <!-- LOGO -->
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="CTF">
                </div>

                <!-- PLACAR -->
                <div class="scoreboard-frame">
                    <div class="scoreboard">
                        <div class="row first">
                            <div class="rank">#1</div>
                            <div class="team">root_access</div>
                            <div class="points">7420</div>
                        </div>
                        <div class="row second">
                            <div class="rank">#2</div>
                            <div class="team">packet_overflow</div>
                            <div class="points">6890</div>
                        </div>
                        <div class="row third">
                            <div class="rank">#3</div>
                            <div class="team">zero_day</div>
                            <div class="points">6540</div>
                        </div>
                        <div class="row">
                            <div class="rank">#4</div>
                            <div class="team">dark_socket</div>
                            <div class="points">6100</div>
                        </div>
                        <div class="row">
                            <div class="rank">#5</div>
                            <div class="team">bit_bandits</div>
                            <div class="points">5840</div>
                        </div>
                        <div class="row">
                            <div class="rank">#6</div>
                            <div class="team">cipher_lords</div>
                            <div class="points">5510</div>
                        </div>
                        <div class="row">
                            <div class="rank">#7</div>
                            <div class="team">null_pointers</div>
                            <div class="points">5200</div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    LIVE SCOREBOARD • CAPTURE THE FLAG
                </div>
            </div>
        </div>
        <div id="screen-challenges" class="screen">
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
        </div>
    </body>
</html>
