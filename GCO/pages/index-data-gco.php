<?php

return [
    'meta' => [
        'title' => 'GCO Connect – Student Counseling & Support',
        'description' => 'Professional counseling services for students. Connect with licensed therapists and the Guidance and Counseling Office.',
    ],
    'paths' => [
        'assets' => 'assets',
        'events' => 'assets/img/events',
        'team_photos' => 'assets/img/GCO Assets/gco faculties',
        'program_logos' => 'assets/img/programs-logo',
    ],
    'booking_url' => 'index.php',
    'cta_benefits' => [
        'Free of charge',
        'Confidential sessions',
        'Licensed counselors',
    ],

    'services' => [
    ['title' => 'Counseling', 'desc' => 'Counseling provides students with a safe and supportive space to discuss concerns affecting their personal, academic, or social life. Counselors work collaboratively with students to help them adjust, grow, and overcome challenges.', 'icon' => 'ki-heart', 'paths' => 2],
    ['title' => 'Consultation', 'desc' => 'Consultations allow counselors to support students, parents, and faculty in addressing specific concerns. Through guidance and collaboration, counselors help identify strengths, resources, and possible solutions.', 'icon' => 'ki-profile-circle', 'paths' => 3],
    ['title' => 'Interview', 'desc' => 'Routine interviews, also known as "kumustahan sessions," serve as an early check-in to support students and identify those who may need additional guidance or assistance.', 'icon' => 'ki-messages', 'paths' => 5],
    ['title' => 'Psychological Testing', 'desc' => 'Psychological testing helps students better understand their strengths, abilities, and areas for improvement through standardized assessments that support informed decisions and personal development.', 'icon' => 'ki-notepad-bookmark', 'paths' => 6],
    ],

    'steps' => [
    ['num' => '01', 'title' => 'Service Type', 'desc' => 'Select the service you want to avail', 'icon' => 'ki-category', 'paths' => 4],
    ['num' => '02', 'title' => 'Basic Info', 'desc' => 'Verify and update your contact details', 'icon' => 'ki-profile-circle', 'paths' => 3],
    ['num' => '03', 'title' => 'Schedule Booking', 'desc' => 'Choose your preferred date and time', 'icon' => 'ki-calendar-2', 'paths' => 5],
    ['num' => '04', 'title' => 'Appointment Details', 'desc' => 'Provide your purpose with any additional notes', 'icon' => 'ki-notepad-bookmark', 'paths' => 6],
    ['num' => '05', 'title' => 'Completed', 'desc' => 'Get ready for your session', 'icon' => 'ki-check-circle', 'paths' => 2],
    ],

    'tests' => [
    ['name' => 'Emotional Quotient', 'desc' => "Measures the ability to recognize, understand, and manage one's own emotions and the emotions of others; focuses on emotional awareness, empathy, and self-regulation.", 'icon' => 'ki-heart', 'paths' => 2],
    ['name' => 'Intelligence', 'desc' => 'Evaluates cognitive abilities such as reasoning, memory, problem-solving, and analytical thinking to estimate overall intellectual functioning.', 'icon' => 'ki-abstract-29', 'paths' => 2],
    ['name' => 'Self-Concept', 'desc' => 'Examines how individuals view themselves—their abilities, identity, and self-worth—to understand factors influencing confidence and motivation.', 'icon' => 'ki-profile-circle', 'paths' => 3],
    ['name' => 'Personality', 'desc' => 'Assesses patterns of thinking, feeling, and behavior to understand personality traits and role/environment compatibility.', 'icon' => 'ki-people', 'paths' => 5],
    ['name' => 'Learning Difficulties', 'desc' => 'Detects possible learning challenges (e.g., reading, writing, math, attention) to support early intervention.', 'icon' => 'ki-book', 'paths' => 4],
    ['name' => 'Adjustment Concerns', 'desc' => "Identifies emotional, social, or behavioral difficulties that may affect one's ability to adapt to situations or environments.", 'icon' => 'ki-focus', 'paths' => 2],
    ['name' => 'Study Attitude & Methods', 'desc' => 'Evaluates motivation, learning habits, study strategies, and overall attitudes toward school to identify academic strengths and improvement areas.', 'icon' => 'ki-notepad', 'paths' => 2],
    ['name' => 'Non-standardized Tests', 'desc' => 'Open-source or online-sourced tests that provide additional evidences for emerging student concerns, as necessary.', 'icon' => 'ki-flag', 'paths' => 2],
    ['name' => 'Career Tests', 'desc' => 'Examine interests, skills, and abilities related to career to guide career development and pathing.', 'icon' => 'ki-briefcase', 'paths' => 2],
    ],

    'categories' => [
    [
        'title' => 'Interview Purposes', 'tab' => 'Interview', 'count' => 4, 'color' => 'primary', 'icon' => 'ki-messages', 'paths' => 5,
        'items' => [
            ['title' => 'Student Leader Interview', 'desc' => "Interview for Incoming, Out-going student leaders' candidate of leadership awardee"],
            ['title' => 'Request for Recommendation', 'desc' => 'For students who are requesting Recommendation Forms for admission and scholarship purposes'],
            ['title' => 'Kumustahan Session or Student Routine Interview', 'desc' => 'General interview in lieu of updates on the students concerns and status'],
            ['title' => 'Student Routine Interview and Test Results Discussion', 'desc' => 'Support for relating and assistance in queries on the results of their psychological test. For clients who have already completed Psychological Test Administration'],
        ],
    ],
    [
        'title' => 'Psychological Test Administration Purposes', 'tab' => 'Psych. Testing', 'count' => 2, 'color' => 'danger', 'icon' => 'ki-notepad-bookmark', 'paths' => 6,
        'items' => [
            ['title' => 'Referred by Counselor', 'desc' => 'Students who received a formal referral from their counselor for Psychological Test Administration, typically following an initial consultation session'],
            ['title' => 'Invitation from GCO Activity', 'desc' => 'Students who participated in GCO special programs (i.e. COPE, RISE, SASE, KUMUSTAHAN, Career Navigation etc.) and invited for Psychological Test Administration'],
        ],
    ],
    [
        'title' => 'Consultation Purposes', 'tab' => 'Consultation', 'count' => 10, 'color' => 'primary', 'icon' => 'ki-briefcase', 'paths' => 2,
        'items' => [
            ['title' => 'Mental Health Support', 'desc' => 'Focused on emotional well-being and psychological health'],
            ['title' => 'Social Adjustment', 'desc' => 'Support for adapting to social environments and improving social interactions'],
            ['title' => 'Peer Relationships', 'desc' => 'Assistance with navigating friendships and peer dynamics'],
            ['title' => 'Family Dynamics', 'desc' => 'Support for addressing family-related challenges and conflicts'],
            ['title' => 'Relationship Development', 'desc' => 'Guidance for building and maintaining healthy relationships'],
            ['title' => 'Academic Support', 'desc' => 'Assistance with academic challenges and improving school performance'],
            ['title' => 'Bereavement', 'desc' => 'Assistance in coping with the loss of someone relatively in the process of grieving'],
            ['title' => 'Occupational Problems', 'desc' => 'Assistance on work related concerns such as adjustments and relational issues'],
            ['title' => 'Legal Problems', 'desc' => 'Concern that involves the law that needs to be addressed'],
            ['title' => 'Consultation and Test Results Discussion', 'desc' => 'Support for relating and assistance in queries on the results of their psychological test.'],
        ],
    ],
    [
        'title' => 'Counseling Purposes', 'tab' => 'Counseling', 'count' => 10, 'color' => 'danger', 'icon' => 'ki-heart', 'paths' => 2,
        'items' => [
            ['title' => 'Mental Health Support', 'desc' => 'Focused on emotional well-being and psychological health'],
            ['title' => 'Social Adjustment', 'desc' => 'Support for adapting to social environments and improving social interactions'],
            ['title' => 'Peer Relationships', 'desc' => 'Assistance with navigating friendships and peer dynamics'],
            ['title' => 'Family Dynamics', 'desc' => 'Support for addressing family-related challenges and conflicts'],
            ['title' => 'Relationship Development', 'desc' => 'Guidance for building and maintaining healthy relationships'],
            ['title' => 'Academic Support', 'desc' => 'Assistance with academic challenges and improving school performance'],
            ['title' => 'Bereavement', 'desc' => 'Assistance in coping with the loss of someone relatively in the process of grieving'],
            ['title' => 'Occupational Problems', 'desc' => 'Assistance on work related concerns such as adjustments and relational issues'],
            ['title' => 'Legal Problems', 'desc' => 'Concern that involves the law that needs to be addressed'],
            ['title' => 'Counseling and Test Results Discussion', 'desc' => 'Support for relating and assistance in queries on the results of their psychological test'],
        ],
    ],
    ],

    'programs' => [
    ['title' => 'IQ and EQ Testing', 'category' => 'Event Ended', 'desc' => "GCO R.A.D.A.R.: IQ and EQ Testing for Term 2, AY '25-26", 'date' => 'Mon • January 19, 2026 • 08:00 AM', 'location' => 'Case room F1604', 'image' => 'IQ and EQ Testing.png'],
    ['title' => 'Kumustahan', 'category' => 'Event Ended', 'desc' => '"KUMUSTAHAN": Group Routine Interview for Students', 'date' => 'Thu • December 4, 2025 • 09:00 AM', 'location' => '1603 AVR', 'image' => 'kumustahan.png'],
    ['title' => 'Starting Your Career Path', 'category' => 'Event Ended', 'desc' => 'Career Development Activity: G.A.B.A.Y. Series – Psychological Testing & Career Discussion', 'date' => 'Mon • December 1, 2025 • 09:00 AM', 'location' => '1603 AVR', 'image' => 'career path.png'],
    ['title' => 'Mental Health Awareness Seminar', 'category' => 'Upcoming', 'desc' => 'GCO Wellness Talk: Understanding Stress, Anxiety & Resilience for FEU Tech Students', 'date' => 'Fri • March 21, 2026 • 10:00 AM', 'location' => '1603 AVR', 'image' => 'kumustahan.png'],
    ['title' => 'Peer Facilitators Training', 'category' => 'Upcoming', 'desc' => 'COPE Program: Peer Facilitators Training & Orientation for AY 2025–2026', 'date' => 'Wed • April 8, 2026 • 09:00 AM', 'location' => 'Case room F1604', 'image' => 'career path.png'],
    ],

    'team' => [
    ['name' => 'Marietta M. Bengat', 'role' => 'DIRECTOR', 'email' => 'mmbengat@feutech.edu.ph', 'photo' => 'Bengat.png', 'contactText' => 'Contact Director'],
    ['name' => 'Rochile G. Borje', 'role' => 'GUIDANCE COUNSELOR', 'email' => 'rgborje@feutech.edu.ph', 'programs' => ['BSCE', 'BSCEM', 'BSCPE', 'BSECE'], 'photo' => 'borje.png', 'contactText' => 'Contact Counselor'],
    ['name' => 'Vilma R. Colinco', 'role' => 'GUIDANCE COUNSELOR', 'email' => 'vrcolinco@feutech.edu.ph', 'programs' => ['BSITSMBA', 'BSCYBER', 'BSMFGE', 'BSCE'], 'photo' => 'Colinco.png', 'contactText' => 'Contact Counselor'],
    ['name' => 'Charlene Marie A. Arabejo', 'role' => 'GUIDANCE COUNSELOR', 'email' => 'caarabejo@feutech.edu.ph', 'programs' => ['BSITSMBA', 'BSCYBER'], 'photo' => 'Arabejo.png', 'contactText' => 'Contact Counselor'],
    ['name' => 'Paula Trisha D. Balcera', 'role' => 'GUIDANCE COUNSELOR', 'email' => 'pdbalcera@feutech.edu.ph', 'programs' => ['BSITWMA', 'BSITAGD'], 'photo' => 'balcera.png', 'contactText' => 'Contact Counselor'],
    ['name' => 'Moira Ashley C. Roy', 'role' => 'PSYCHOMETRICIAN', 'email' => 'mcroy@feutech.edu.ph', 'programs' => ['BSMFGE', 'BSCE', 'BSITWMA', 'BSITAGD'], 'photo' => 'roy.png', 'contactText' => 'Contact Psychometrician'],
    ],

    'faqs' => [
    ['q' => 'What is GCO Connect?', 'a' => 'GCO Connect is the official online appointment system of the FEU Tech Guidance and Counseling Office (GCO). It allows students to easily book counseling, consultation, and other guidance services.'],
    ['q' => 'Who is eligible to use GCO Connect?', 'a' => 'All currently enrolled students of FEU Tech, FEU Diliman, and FEU Alabang are eligible to use GCO Connect to access counseling and guidance services.'],
    ['q' => 'What services are available for booking through GCO Connect?', 'a' => 'Available services include Counseling, Consultation, Interviews (Kumustahan), and Psychological Testing.'],
    ['q' => 'How can I schedule an appointment using GCO Connect?', 'a' => 'Log in to the GCO Connect portal using your student credentials, select your desired service, choose an available time slot with your assigned counselor, and confirm your booking.'],
    ['q' => 'How can I book a follow-up appointment in GCO Connect?', 'a' => 'After your initial session, you can book a follow-up appointment through the same portal by selecting the "Follow-up" option or coordinating with your counselor during your session.'],
    ['q' => 'How can I view or obtain my appointment records?', 'a' => 'You can view your current and past appointments through the "My Appointments" or "History" section of the GCO Connect dashboard. For formal records, please contact the GCO office directly.'],
    ['q' => 'Who should I contact if I experience technical issues or need assistance?', 'a' => 'If you experience any technical issues with GCO Connect, you may email the Guidance and Counseling Office at guidance@feutech.edu.ph or visit the GCO office in person.'],
    ],
];
