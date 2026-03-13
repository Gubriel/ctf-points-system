<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <title>CTF Championship</title>
        <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-black">
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
    <script>

        const screens = [
            document.getElementById("screen-scoreboard"),
            document.getElementById("screen-challenges")
        ];

        let current = 0;

        setInterval(() => {
            screens[current].classList.remove("active");
            current = (current + 1) % screens.length;
            screens[current].classList.add("active");
            screens[current].classList.add("glitch");
            setTimeout(()=>{
                screens[current].classList.remove("glitch");
            },350);
        }, 10000);
    </script>
</html>
