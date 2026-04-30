<style>
    /*BG*/
    .arc-how-section {
        position: relative;
        padding: 120px 0;
        width: 100vw;
        margin-left: calc(-50vw + 50%);
        background: radial-gradient(circle at center, #ffffff 0%, #fffaf5 100%);
        overflow: hidden;
    }

    /*simpleandfun*/
    .arc-hero-tag {
        background-color: #FFF2EB;
        /* Light peach fill */
        border: 1.2px solid #FFD8C2;
        /* Soft border */
        border-radius: 50px;
        color: #E8521A;
        font-family: 'inter';
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1px;
        padding: 6px 20px;
        display: inline-block;
        margin-bottom: 15px;
    }

    /*BG circles*/
    .arc-how-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url("data:image/svg+xml,%3Csvg width='1200' height='1200' viewBox='0 0 1200 1200' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%23f97316' stroke-width='1' stroke-opacity='0.06'%3E%3Ccircle cx='600' cy='600' r='100'/%3E%3Ccircle cx='600' cy='600' r='200'/%3E%3Ccircle cx='600' cy='600' r='300'/%3E%3Ccircle cx='600' cy='600' r='400'/%3E%3Ccircle cx='600' cy='600' r='500'/%3E%3Ccircle cx='1100' cy='100' r='150'/%3E%3Ccircle cx='1100' cy='100' r='250'/%3E%3Ccircle cx='100' cy='1100' r='200'/%3E%3Ccircle cx='100' cy='1100' r='350'/%3E%3C/g%3E%3C/svg%3E");
        background-size: cover;
        background-position: center;
        z-index: 0;
        pointer-events: none;
    }

    /*steps 123 small box*/
    .arc-how-step {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #E8521A;
        /* Fixed color from your hero */
        color: #fff;
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        width: 48px;
        height: 48px;
        border-radius: 14px;
        margin-bottom: 2rem;
        box-shadow: 0 8px 20px rgba(232, 82, 26, 0.25);
    }

    /*card white*/
    .arc-how-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid #f3ede6;
        border-top: 8px solid #E8521A;
        border-radius: 24px;
        padding: 3.5rem 2.5rem;
        text-align: left;
        height: 100%;
        transition: transform 0.3s ease;
    }

    /*animation hove*/
    .arc-how-card:hover {
        transform: translateY(-10px);
    }

    /*card header*/
    .arc-how-card h5 {
        font-family: 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: 900;
        color: #1C1917;
        margin-bottom: 1rem;
    }

    /*color*/
    .card-02 {
        border-top-color: #F5A623 !important;
    }

    .step-02 {
        background: #F5A623 !important;
        box-shadow: 0 8px 20px rgba(245, 166, 35, 0.25) !important;
    }

    .card-03 {
        border-top-color: #E8521A !important;
    }

    .step-03 {
        background: #E8521A !important;
        box-shadow: 0 8px 20px rgba(251, 146, 60, 0.25) !important;
    }
</style>

<section class="arc-how-section">
    <div class="container">
        <div class="text-center mb-5">
            <div class="arc-hero-tag">
                SIMPLE & FUN
            </div>
            <h2 style="font-family: 'inter'; font-weight: 900; font-size: clamp(2.5rem, 5vw, 3.5rem); color: #1C1917; margin-bottom: 1rem;">How Arcadia Works</h2>
            <p style="font-family: 'inter'; color: #78716C; max-width: 600px; margin: 0 auto; font-size: 1.1rem;">
                Three easy steps to turn your academic grind into an epic adventure.
            </p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="arc-how-card">
                    <div class="arc-how-step">01</div>
                    <h5>EARN BADGES</h5>
                    <p>Complete activities, join events, and hit academic milestones to collect exclusive digital badges. Each one reflects your real achievements.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="arc-how-card card-02">
                    <div class="arc-how-step step-02">02</div>
                    <h5>COLLECT XP + COINS</h5>
                    <p>Every badge fills up your XP wallet. More XP means higher levels and better rankings, while coins unlock exclusive perks in the store.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="arc-how-card card-03">
                    <div class="arc-how-step step-03">03</div>
                    <h5>REDEEM REAL MERCH</h5>
                    <p>Stay on track and trade your coins for limited-edition FEU Tech merch. Your effort, turned into something you can wear and show off.</p>
                </div>
            </div>
        </div>
    </div>
</section>