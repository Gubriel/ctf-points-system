<x-app-layout>
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
</x-app-layout>
