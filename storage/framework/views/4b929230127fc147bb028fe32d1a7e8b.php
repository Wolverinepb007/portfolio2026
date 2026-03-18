<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($profile->name ?? 'QA Engineer'); ?> | Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-deep: #0a0c10;
            --bg-card: rgba(255, 255, 255, 0.03);
            --bg-card-hover: rgba(255, 255, 255, 0.05);
            --accent-primary: #6366f1; /* Indigo */
            --accent-secondary: #22d3ee; /* Cyan */
            --text-main: #f3f4f6;
            --text-dim: #9ca3af;
            --border: rgba(255, 255, 255, 0.1);
            --glass-blur: 12px;
            --transition-smooth: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        body {
            background-color: var(--bg-deep);
            color: var(--text-main);
            font-family: 'Outfit', sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            background: radial-gradient(circle at 70% 30%, rgba(99, 102, 241, 0.15), transparent 50%),
                        radial-gradient(circle at 30% 70%, rgba(34, 211, 238, 0.1), transparent 50%);
        }

        .hero-content {
            z-index: 10;
        }

        .hero h1 {
            font-size: 5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, var(--text-main) 30%, var(--accent-primary) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero .role {
            font-family: 'JetBrains Mono', monospace;
            font-size: 1.25rem;
            color: var(--accent-secondary);
            margin-bottom: 2rem;
            display: block;
            letter-spacing: 2px;
        }

        .hero .bio {
            font-size: 1.2rem;
            color: var(--text-dim);
            max-width: 600px;
            margin-bottom: 3rem;
        }

        /* Glass Cards */
        .glass-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            backdrop-filter: blur(var(--glass-blur));
            border-radius: 24px;
            padding: 2.5rem;
            transition: var(--transition-smooth);
        }

        .glass-card:hover {
            transform: translateY(-8px);
            background: var(--bg-card-hover);
            border-color: var(--accent-primary);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        /* Sections */
        section {
            padding: 100px 0;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 4rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .section-title::after {
            content: '';
            height: 1px;
            flex-grow: 1;
            background: linear-gradient(to right, var(--accent-primary), transparent);
        }

        /* Skills Grid */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .skill-category h3 {
            color: var(--accent-secondary);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .skill-item {
            margin-bottom: 1rem;
        }

        .skill-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }

        .proficiency-bar {
            height: 6px;
            background: var(--border);
            border-radius: 3px;
            overflow: hidden;
        }

        .proficiency-fill {
            height: 100%;
            background: linear-gradient(to right, var(--accent-primary), var(--accent-secondary));
            border-radius: 3px;
        }

        /* Projects */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2.5rem;
        }

        .project-card {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .project-image {
            width: 100%;
            height: 200px;
            background: #1a1e26;
            border-radius: 16px;
            overflow: hidden;
        }

        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .project-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .tag {
            background: rgba(99, 102, 241, 0.1);
            color: var(--accent-primary);
            padding: 0.25rem 0.75rem;
            border-radius: 100px;
            font-size: 0.8rem;
            font-family: 'JetBrains Mono', monospace;
        }

        /* Experience Timeline */
        .experience-item {
            position: relative;
            padding-left: 3rem;
            border-left: 2px solid var(--border);
            margin-bottom: 3rem;
        }

        .experience-item::before {
            content: '';
            position: absolute;
            left: -9px;
            top: 0;
            width: 16px;
            height: 16px;
            background: var(--accent-primary);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--accent-primary);
        }

        .duration {
            color: var(--accent-secondary);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
            display: block;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1.5rem 0;
            z-index: 100;
            transition: var(--transition-smooth);
        }

        nav.scrolled {
            background: rgba(10, 12, 16, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border);
            padding: 1rem 0;
        }

        .nav-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-main);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
        }

        .nav-links a {
            color: var(--text-dim);
            text-decoration: none;
            font-size: 1rem;
            transition: var(--transition-smooth);
        }

        .nav-links a:hover {
            color: var(--accent-primary);
        }

        /* CTA Button */
        .cta-button {
            background: linear-gradient(135deg, var(--accent-primary), var(--accent-secondary));
            color: white;
            padding: 1rem 2rem;
            border-radius: 100px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: var(--transition-smooth);
            border: none;
            cursor: pointer;
        }

        .cta-button:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }

        /* Footer */
        footer {
            padding: 4rem 0;
            border-top: 1px solid var(--border);
            text-align: center;
            color: var(--text-dim);
        }

        .qa-manifesto ul {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .qa-manifesto li {
            position: relative;
            padding-left: 1.5rem;
        }

        .qa-manifesto li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--accent-secondary);
            font-weight: 800;
        }

        .qa-manifesto strong {
            color: var(--accent-primary);
            display: block;
            margin-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .hero h1 { font-size: 3rem; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$profile): ?>
    <div style="height: 100vh; display: flex; align-items: center; justify-content: center; text-align: center; padding: 2rem;">
        <div>
            <h1>Setup Required</h1>
            <p>Please log in to the <a href="/admin" style="color: var(--accent-primary);">admin panel</a> and create a profile.</p>
        </div>
    </div>
<?php else: ?>
    <nav id="navbar">
        <div class="container nav-content">
            <a href="#" class="logo">PB.</a>
            <div class="nav-links">
                <a href="#about">About</a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($profile->principles): ?>
                    <a href="#principles">Principles</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <a href="#skills">Skills</a>
                <a href="#projects">Projects</a>
                <a href="#experience">Experience</a>
            </div>
            <a href="mailto:<?php echo e($profile->email); ?>" class="cta-button">Contact Me</a>
        </div>
    </nav>

    <header class="hero">
        <div class="container hero-content">
            <span class="role"><?php echo e($profile->role); ?></span>
            <h1><?php echo e($profile->name); ?></h1>
            <div class="bio"><?php echo $profile->bio; ?></div>
            <div style="display: flex; gap: 1.5rem;">
                <a href="#projects" class="cta-button">View Work</a>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($profile->github): ?>
                    <a href="<?php echo e($profile->github); ?>" class="glass-card" style="padding: 1rem 2rem; text-decoration: none; color: white;">Github</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($profile->resume): ?>
                    <a href="<?php echo e(asset('storage/' . $profile->resume)); ?>" target="_blank" class="glass-card" style="padding: 1rem 2rem; text-decoration: none; color: white; border-color: var(--accent-secondary);">Download Resume</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </header>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($profile->principles): ?>
    <section id="principles" style="background: rgba(255, 255, 255, 0.02);">
        <div class="container">
            <h2 class="section-title">Quality Assurance Principles</h2>
            <div class="glass-card" style="max-width: 900px; margin: 0 auto;">
                <div class="qa-manifesto" style="font-size: 1.1rem; line-height: 1.8;">
                    <?php echo $profile->principles; ?>

                </div>
            </div>
        </div>
    </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <section id="skills">
        <div class="container">
            <h2 class="section-title">Technical Expertise</h2>
            <div class="skills-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $skillList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="glass-card skill-category">
                        <h3><?php echo e($category); ?></h3>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $skillList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="skill-item">
                                <div class="skill-info">
                                    <span><?php echo e($skill->name); ?></span>
                                    <span style="color: var(--text-dim);"><?php echo e($skill->proficiency * 10); ?>%</span>
                                </div>
                                <div class="proficiency-bar">
                                    <div class="proficiency-fill" style="width: <?php echo e($skill->proficiency * 10); ?>%"></div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <section id="projects">
        <div class="container">
            <h2 class="section-title">Featured Projects</h2>
            <div class="projects-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="glass-card project-card">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->image): ?>
                            <div class="project-image">
                                <img src="<?php echo e(asset('storage/' . $project->image)); ?>" alt="<?php echo e($project->title); ?>">
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <h3><?php echo e($project->title); ?></h3>
                        <p style="color: var(--text-dim); font-size: 0.95rem;"><?php echo e($project->description); ?></p>
                        <div class="project-tags">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = explode(',', $project->tools_used); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="tag"><?php echo e(trim($tool)); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($project->link): ?>
                            <a href="<?php echo e($project->link); ?>" style="color: var(--accent-secondary); text-decoration: none; font-size: 0.9rem; font-weight: 600;">Explore Repository →</a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <section id="experience">
        <div class="container">
            <h2 class="section-title">Professional Journey</h2>
            <div style="max-width: 800px; margin: 0 auto;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="experience-item">
                        <span class="duration"><?php echo e($exp->duration); ?></span>
                        <h3 style="font-size: 1.5rem; margin-bottom: 0.5rem;"><?php echo e($exp->position); ?></h3>
                        <p style="color: var(--accent-primary); font-weight: 600; margin-bottom: 1rem;"><?php echo e($exp->company); ?></p>
                        <p style="color: var(--text-dim);"><?php echo e($exp->description); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <section id="certifications">
        <div class="container">
            <h2 class="section-title">Certifications</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2rem;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $certifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="glass-card" style="padding: 1.5rem;">
                        <h4 style="margin-bottom: 0.5rem;"><?php echo e($cert->name); ?></h4>
                        <p style="color: var(--accent-secondary); font-size: 0.9rem; margin-bottom: 0.5rem;"><?php echo e($cert->issuing_organization); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cert->issue_date): ?>
                            <p style="color: var(--text-dim); font-size: 0.8rem;"><?php echo e(\Carbon\Carbon::parse($cert->issue_date)->format('M Y')); ?></p>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; <?php echo e(date('Y')); ?> <?php echo e($profile->name); ?>. All rights reserved.</p>
            <p style="margin-top: 1rem; font-size: 0.8rem;">Built with Laravel & Passion</p>
        </div>
    </footer>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<script>
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('navbar');
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });

    // Simple reveal animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.glass-card, .experience-item').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'all 0.8s ease-out';
        observer.observe(el);
    });
</script>

</body>
</html>
<?php /**PATH /Users/anishkhatri/Downloads/muji/portfolio/resources/views/portfolio.blade.php ENDPATH**/ ?>