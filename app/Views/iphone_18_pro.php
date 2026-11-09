<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($meta['title']) ?></title>
    <meta name="description" content="<?= esc($meta['description']) ?>">
    <meta name="author" content="<?= esc($meta['author']) ?>">
    <link rel="canonical" href="<?= esc($meta['canonical']) ?>">

    <!-- Inter / SF Pro-inspired Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', '-apple-system', 'BlinkMacSystemFont', '"SF Pro Display"', 'Segoe UI', 'Roboto', 'sans-serif'],
                    },
                    colors: {
                        dark: {
                            950: '#030305',
                            900: '#07070a',
                            850: '#0b0c10',
                            800: '#12131a',
                            700: '#1a1c26',
                        },
                        titanium: {
                            light: '#e2e5eb',
                            DEFAULT: '#8f929b',
                            dark: '#2d2e35',
                            raw: '#62656d'
                        },
                        holo: {
                            cyan: '#00f2fe',
                            purple: '#a855f7',
                            blue: '#3b82f6',
                            emerald: '#10b981'
                        }
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                            '50%': { transform: 'translateY(-12px) rotate(0.8deg)' }
                        },
                        pulseGlow: {
                            '0%, 100%': { opacity: '0.4', transform: 'scale(1)' },
                            '50%': { opacity: '0.75', transform: 'scale(1.06)' }
                        },
                        holoBeam: {
                            '0%': { opacity: '0.3', transform: 'translateY(15px) scale(0.95)' },
                            '50%': { opacity: '0.8', transform: 'translateY(0px) scale(1.02)' },
                            '100%': { opacity: '0.3', transform: 'translateY(15px) scale(0.95)' }
                        },
                        radarScan: {
                            '0%': { transform: 'rotate(0deg)' },
                            '100%': { transform: 'rotate(360deg)' }
                        }
                    },
                    animation: {
                        float: 'float 7s ease-in-out infinite',
                        pulseGlow: 'pulseGlow 5s ease-in-out infinite',
                        holoBeam: 'holoBeam 4s ease-in-out infinite',
                        radar: 'radarScan 10s linear infinite'
                    }
                }
            }
        }
    </script>

    <style>
        /* Apple-esque Custom Utilities */
        ::selection {
            background-color: #3b82f6;
            color: #ffffff;
        }

        /* Ambient Glass Background */
        .glass-nav {
            background: rgba(7, 7, 10, 0.72);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-card {
            background: rgba(18, 19, 26, 0.65);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-card:hover {
            border-color: rgba(255, 255, 255, 0.2);
        }

        .text-gradient-apple {
            background: linear-gradient(180deg, #FFFFFF 0%, #A1A1AA 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-holo {
            background: linear-gradient(135deg, #00f2fe 0%, #4facfe 50%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-titanium {
            background: linear-gradient(180deg, #F3F4F6 0%, #9CA3AF 50%, #4B5563 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Realistic 3D Phone Chassis */
        .phone-perspective {
            perspective: 1200px;
        }

        .phone-body {
            transform-style: preserve-3d;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s ease;
        }

        .holo-emitter-grid {
            background-image: radial-gradient(rgba(0, 242, 254, 0.25) 1px, transparent 1px);
            background-size: 14px 14px;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #030305;
        }
        ::-webkit-scrollbar-thumb {
            background: #1f242d;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #3b82f6;
        }
    </style>
</head>
<body class="bg-dark-950 text-slate-100 font-sans antialiased selection:bg-blue-600 selection:text-white relative overflow-x-hidden">

    <!-- Ambient Cosmic Lighting (Background Blurs) -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div id="ambient-glow-primary" class="absolute -top-40 left-1/2 -translate-x-1/2 w-[650px] md:w-[900px] h-[500px] bg-blue-600/15 rounded-full blur-[140px] transition-all duration-700 animate-pulseGlow"></div>
        <div id="ambient-glow-secondary" class="absolute top-[40%] -left-48 w-[500px] h-[500px] bg-purple-600/10 rounded-full blur-[160px] pointer-events-none"></div>
        <div class="absolute top-[75%] -right-48 w-[500px] h-[500px] bg-cyan-600/10 rounded-full blur-[160px] pointer-events-none"></div>
    </div>

    <!-- Top Master Navigation -->
    <header class="fixed top-0 inset-x-0 z-50 transition-all duration-300" id="main-header">
        <div class="glass-nav">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-14 flex items-center justify-between">
                
                <!-- Logo -->
                <a href="#hero" class="flex items-center gap-2.5 group">
                    <div class="w-7 h-7 rounded-lg bg-gradient-to-tr from-white/20 via-white/10 to-transparent p-[1px] flex items-center justify-center border border-white/20 group-hover:border-white/50 transition">
                        <!-- Apple-esque futuristic logo -->
                        <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.37c.62-.75 1.04-1.8 0.92-2.85-.9.04-1.99.6-2.63 1.35-.57.65-1.07 1.72-.94 2.74 1.01.08 2.03-.49 2.65-1.24z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold tracking-tight text-white group-hover:text-blue-400 transition">Future<span class="font-normal text-slate-400">Apple</span></span>
                </a>

                <!-- Desktop Links -->
                <nav class="hidden md:flex items-center space-x-8 text-xs font-medium text-slate-300">
                    <a href="#overview" class="hover:text-white transition duration-200">Overview</a>
                    <a href="#features" class="hover:text-white transition duration-200">Features</a>
                    <a href="#camera" class="hover:text-white transition duration-200">Hyper-Lens</a>
                    <a href="#specs" class="hover:text-white transition duration-200">Tech Specs</a>
                    <a href="#colors" class="hover:text-white transition duration-200">Finishes</a>
                </nav>

                <!-- Actions -->
                <div class="flex items-center gap-3">
                    <button onclick="openPreOrderModal()" class="relative group overflow-hidden rounded-full p-[1px] focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <span class="absolute inset-0 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 rounded-full transition-all duration-300 group-hover:scale-105"></span>
                        <span class="relative px-4 py-1.5 bg-dark-950/90 rounded-full flex items-center gap-1.5 text-xs font-semibold text-white tracking-wide transition-all group-hover:bg-opacity-0">
                            <span>Pre-Order</span>
                            <svg class="w-3.5 h-3.5 text-blue-400 group-hover:text-white group-hover:translate-x-0.5 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="md:hidden p-1.5 text-slate-400 hover:text-white focus:outline-none" aria-label="Toggle Navigation">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Sub-Nav / Sticky Product Bar -->
        <div class="border-b border-white/5 bg-dark-900/60 backdrop-blur-md hidden sm:block">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 flex items-center justify-between text-xs">
                <div class="flex items-center gap-2">
                    <span class="font-bold text-white tracking-tight">iPhone 18 Pro</span>
                    <span class="px-2 py-0.5 rounded-full text-[10px] bg-blue-500/20 text-blue-400 border border-blue-500/30 font-medium">Volumetric Spatial Edition</span>
                </div>
                <div class="flex items-center gap-6 text-slate-400">
                    <span>From <?= esc($product['priceStarting']) ?> or $49.95/mo.</span>
                    <a href="#specs" class="text-blue-400 hover:text-blue-300 transition">Full Specifications &rarr;</a>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobile-menu" class="hidden md:hidden glass-card border-t border-b border-white/10 px-6 py-5 space-y-4">
            <a href="#overview" class="block text-sm text-slate-200 hover:text-white" onclick="closeMobileMenu()">Overview</a>
            <a href="#features" class="block text-sm text-slate-200 hover:text-white" onclick="closeMobileMenu()">Features</a>
            <a href="#camera" class="block text-sm text-slate-200 hover:text-white" onclick="closeMobileMenu()">Hyper-Lens Camera</a>
            <a href="#specs" class="block text-sm text-slate-200 hover:text-white" onclick="closeMobileMenu()">Tech Specs</a>
            <a href="#colors" class="block text-sm text-slate-200 hover:text-white" onclick="closeMobileMenu()">Finishes</a>
            <button onclick="closeMobileMenu(); openPreOrderModal();" class="w-full py-2.5 rounded-full bg-blue-600 text-xs font-semibold text-white text-center">
                Pre-Order Now
            </button>
        </div>
    </header>

    <!-- Main Content Container -->
    <main class="relative z-10 pt-24 sm:pt-28">

        <!-- ==================== HERO SECTION ==================== -->
        <section id="hero" class="relative min-h-[92vh] flex flex-col items-center justify-between px-4 sm:px-6 lg:px-8 pt-10 pb-16 overflow-hidden">
            
            <!-- Headline Container -->
            <div class="text-center max-w-4xl mx-auto space-y-4 z-20">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 text-xs font-medium text-slate-300 mb-2 backdrop-blur-md">
                    <span class="w-2 h-2 rounded-full bg-blue-400 animate-ping"></span>
                    <span>Introducing Next-Era Spatial Quantum Phone</span>
                </div>

                <h1 class="text-5xl sm:text-7xl lg:text-8xl font-extrabold tracking-tight text-gradient-apple leading-[1.08]">
                    iPhone 18 Pro
                </h1>

                <p class="text-2xl sm:text-3xl lg:text-4xl font-semibold text-gradient-holo max-w-2xl mx-auto tracking-tight">
                    <?= esc($product['tagline']) ?>
                </p>

                <p class="text-sm sm:text-base lg:text-lg text-slate-400 max-w-2xl mx-auto font-normal leading-relaxed">
                    <?= esc($product['subheadline']) ?>
                </p>

                <!-- CTA Buttons -->
                <div class="pt-4 flex flex-wrap items-center justify-center gap-4">
                    <button onclick="openPreOrderModal()" class="px-8 py-3.5 rounded-full bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-semibold text-sm tracking-wide shadow-lg shadow-blue-500/25 transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0 flex items-center gap-2">
                        <span>Pre-Order Now</span>
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                    
                    <a href="#features" class="px-7 py-3.5 rounded-full glass-card hover:bg-white/10 text-slate-300 hover:text-white font-medium text-sm transition-all duration-200 border border-white/10 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                        <span>Explore Innovation</span>
                    </a>
                </div>

                <p class="text-xs text-slate-500 pt-2">
                    Available starting <?= esc($product['releaseWindow']) ?>. From <?= esc($product['priceStarting']) ?>.
                </p>
            </div>

            <!-- ==================== 3D INTERACTIVE PHONE HERO MOCKUP ==================== -->
            <div class="relative w-full max-w-3xl mx-auto mt-12 mb-6 flex items-center justify-center phone-perspective z-10" id="hero-phone-container">
                
                <!-- Holographic Light Beam Emitter -->
                <div class="absolute -top-24 w-80 h-96 bg-gradient-to-b from-cyan-400/20 via-blue-500/10 to-transparent blur-2xl rounded-full pointer-events-none animate-holoBeam"></div>
                
                <!-- Floating Hologram Spatial UI elements -->
                <div class="absolute -top-12 -left-4 sm:left-4 z-30 transform -rotate-6 transition-all duration-500 hover:rotate-0">
                    <div class="glass-card px-4 py-2.5 rounded-2xl shadow-2xl border border-cyan-400/30 flex items-center gap-3 bg-dark-900/80 backdrop-blur-xl">
                        <div class="w-8 h-8 rounded-xl bg-cyan-500/20 flex items-center justify-center text-cyan-400">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-[10px] uppercase font-bold tracking-wider text-cyan-400">Quantum Battery</div>
                            <div class="text-xs font-semibold text-white">NeverCharge™ 100%</div>
                        </div>
                    </div>
                </div>

                <div class="absolute top-1/3 -right-2 sm:right-6 z-30 transform rotate-3 transition-all duration-500 hover:rotate-0">
                    <div class="glass-card px-4 py-2.5 rounded-2xl shadow-2xl border border-purple-400/30 flex items-center gap-3 bg-dark-900/80 backdrop-blur-xl">
                        <div class="w-8 h-8 rounded-xl bg-purple-500/20 flex items-center justify-center text-purple-400">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-[10px] uppercase font-bold tracking-wider text-purple-400">Volumetric HUD</div>
                            <div class="text-xs font-semibold text-white">3D Hologram Active</div>
                        </div>
                    </div>
                </div>

                <!-- 3D Smartphone Frame -->
                <div id="phone-chassis" class="phone-body relative w-[290px] sm:w-[330px] md:w-[360px] h-[580px] sm:h-[660px] md:h-[710px] rounded-[52px] p-[10px] transition-all duration-500 shadow-[0_25px_60px_-15px_rgba(0,0,0,0.9),0_0_50px_rgba(59,130,246,0.3)] bg-gradient-to-b from-[#40434c] via-[#1a1b22] to-[#0d0e13] border-4 border-[#333642]">
                    
                    <!-- Outer Titanium Bevel Reflection -->
                    <div class="absolute inset-0 rounded-[48px] pointer-events-none ring-1 ring-white/20"></div>

                    <!-- Side Buttons (Simulated) -->
                    <div class="absolute -left-[14px] top-28 w-[4px] h-10 bg-[#353842] rounded-l-md border-l border-white/20"></div>
                    <div class="absolute -left-[14px] top-44 w-[4px] h-14 bg-[#353842] rounded-l-md border-l border-white/20"></div>
                    <div class="absolute -left-[14px] top-60 w-[4px] h-14 bg-[#353842] rounded-l-md border-l border-white/20"></div>
                    <div class="absolute -right-[14px] top-36 w-[4px] h-20 bg-[#353842] rounded-r-md border-r border-white/20"></div>

                    <!-- Inner Bezel -->
                    <div class="relative w-full h-full rounded-[44px] bg-black overflow-hidden flex flex-col justify-between p-5 border border-white/10">
                        
                        <!-- Screen Ambient Gradient & Particle Background -->
                        <div class="absolute inset-0 bg-gradient-to-b from-blue-950/40 via-dark-950 to-purple-950/30 pointer-events-none"></div>
                        <div class="absolute inset-0 holo-emitter-grid opacity-20 pointer-events-none"></div>

                        <!-- Top Dynamic Island 2.0 / Holographic Projector -->
                        <div class="relative z-20 flex flex-col items-center">
                            <div class="w-28 h-6 bg-black/90 rounded-full border border-white/15 px-3 flex items-center justify-between shadow-inner">
                                <div class="w-2.5 h-2.5 rounded-full bg-[#182030] ring-1 ring-blue-500/40 flex items-center justify-center">
                                    <div class="w-1 h-1 rounded-full bg-cyan-400 animate-ping"></div>
                                </div>
                                <div class="text-[9px] font-mono text-cyan-400 tracking-wider">HOLO 3.0</div>
                                <div class="w-2 h-2 rounded-full bg-purple-900/60 ring-1 ring-purple-400/40"></div>
                            </div>
                        </div>

                        <!-- Center Futuristic Screen Visual: Holographic Globe & Telemetry -->
                        <div class="relative z-10 flex flex-col items-center justify-center my-auto text-center space-y-4">
                            <!-- Floating Spatial Projection Sphere -->
                            <div class="relative w-36 h-36 sm:w-44 sm:h-44 flex items-center justify-center">
                                <div class="absolute inset-0 rounded-full border border-cyan-400/30 animate-radar"></div>
                                <div class="absolute inset-3 rounded-full border border-dashed border-purple-400/40 animate-spin" style="animation-duration: 25s;"></div>
                                <div class="absolute inset-8 rounded-full bg-gradient-to-tr from-blue-600/30 to-purple-600/30 backdrop-blur-md flex items-center justify-center border border-white/20 shadow-lg shadow-cyan-500/20">
                                    <svg class="w-12 h-12 text-cyan-300 animate-pulse" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <circle cx="12" cy="12" r="10" stroke-width="1.5"/>
                                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" stroke-width="1.5"/>
                                        <path d="M2 12h20" stroke-width="1.5"/>
                                    </svg>
                                </div>
                                <div class="absolute -bottom-2 px-3 py-0.5 rounded-full bg-black/80 border border-cyan-400/40 text-[9px] font-mono text-cyan-300">
                                    SPATIAL FIELD READY
                                </div>
                            </div>

                            <div class="space-y-1">
                                <p class="text-xs font-mono text-slate-400 uppercase tracking-widest">Apple Spatial OS 20</p>
                                <p class="text-lg font-bold text-white tracking-tight">Gesture Air Touch</p>
                                <p class="text-[11px] text-slate-400 max-w-[210px]">Zero glass contact required. Spatial laser tracking 1,000 pts/sec.</p>
                            </div>
                        </div>

                        <!-- Bottom Home Bar Indicator -->
                        <div class="relative z-20 flex flex-col items-center pt-2">
                            <div class="w-32 h-1 bg-white/40 rounded-full"></div>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Color Palette Switcher (Interactive) -->
            <div id="colors" class="z-20 w-full max-w-xl mx-auto mt-4 text-center">
                <p class="text-xs font-semibold uppercase tracking-widest text-slate-400 mb-3">Available in 4 Grade-6 Titanium Finishes</p>
                <div class="flex items-center justify-center gap-4">
                    <?php foreach ($finishes as $index => $finish): ?>
                        <button onclick="setPhoneFinish('<?= esc($finish['id']) ?>', '<?= esc($finish['name']) ?>', '<?= esc($finish['hex']) ?>', '<?= esc($finish['accentGlow']) ?>')"
                                class="finish-btn group relative flex flex-col items-center focus:outline-none <?= $index === 0 ? 'active' : '' ?>"
                                data-finish-id="<?= esc($finish['id']) ?>"
                                title="<?= esc($finish['name']) ?>">
                            <span class="w-8 h-8 rounded-full p-0.5 transition-all duration-300 border-2 <?= $index === 0 ? 'border-white scale-110 shadow-lg' : 'border-white/20 hover:border-white/60' ?>">
                                <span class="w-full h-full rounded-full block" style="background-color: <?= esc($finish['hex']) ?>;"></span>
                            </span>
                            <span class="text-[10px] mt-1.5 text-slate-400 group-hover:text-slate-200 transition font-medium"><?= esc($finish['name']) ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>
                <p id="finish-desc" class="text-xs text-slate-400 mt-3 font-normal transition-all duration-300">
                    <?= esc($finishes[0]['description']) ?>
                </p>
            </div>

        </section>

        <!-- ==================== OVERVIEW / PHILOSOPHY ==================== -->
        <section id="overview" class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto border-t border-white/5 relative">
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                <h2 class="text-xs uppercase tracking-widest font-bold text-blue-400">Pure Forward Engineering</h2>
                <h3 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
                    Beyond Silicon. Beyond Glass.
                </h3>
                <p class="text-base sm:text-lg text-slate-400 leading-relaxed">
                    iPhone 18 Pro merges aerospace quantum photonics with liquid crystalline titanium. Designed for those who demand not just evolution, but a total technological leap.
                </p>
            </div>

            <!-- 3 Key Metric Pillars -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="glass-card rounded-3xl p-8 border border-white/10 hover:border-blue-500/40 transition duration-300 relative overflow-hidden group">
                    <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-blue-500/10 rounded-full blur-2xl group-hover:bg-blue-500/20 transition"></div>
                    <div class="text-4xl sm:text-5xl font-extrabold text-gradient-apple mb-2">1.4nm</div>
                    <div class="text-sm font-bold text-white mb-1">Photonic Architecture</div>
                    <p class="text-xs text-slate-400 leading-relaxed">A20 Quantum Pro integrates silicon photonics, bypassing copper heat limitations for near-infinite clock stability.</p>
                </div>

                <div class="glass-card rounded-3xl p-8 border border-white/10 hover:border-purple-500/40 transition duration-300 relative overflow-hidden group">
                    <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-purple-500/10 rounded-full blur-2xl group-hover:bg-purple-500/20 transition"></div>
                    <div class="text-4xl sm:text-5xl font-extrabold text-gradient-holo mb-2">7 Days</div>
                    <div class="text-sm font-bold text-white mb-1">Zero-Cord Energy</div>
                    <p class="text-xs text-slate-400 leading-relaxed">Kinetic ambient collectors harvest microscopic thermal variations and movement, turning reality into electrical charge.</p>
                </div>

                <div class="glass-card rounded-3xl p-8 border border-white/10 hover:border-cyan-500/40 transition duration-300 relative overflow-hidden group">
                    <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-cyan-500/10 rounded-full blur-2xl group-hover:bg-cyan-500/20 transition"></div>
                    <div class="text-4xl sm:text-5xl font-extrabold text-white mb-2">200 MP</div>
                    <div class="text-sm font-bold text-white mb-1">Planetary Precision</div>
                    <p class="text-xs text-slate-400 leading-relaxed">Periscope quad-prism array with real-time neural lunar tracking capable of resolving distant cosmic bodies.</p>
                </div>
            </div>
        </section>

        <!-- ==================== BENTO GRID FEATURES ==================== -->
        <section id="features" class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto border-t border-white/5 relative">
            
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/10 border border-blue-500/20 text-xs font-medium text-blue-400">
                    Bento Architecture 2026
                </div>
                <h2 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
                    Four Breakthroughs. One Monolith.
                </h2>
                <p class="text-sm sm:text-base text-slate-400">
                    Engineered from the molecular level up to redefine human-digital interaction.
                </p>
            </div>

            <!-- Modern Bento Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

                <!-- 1. A20 Bionic Chip (Col 8) -->
                <div class="lg:col-span-8 glass-card rounded-3xl p-8 sm:p-10 border border-white/10 hover:border-blue-500/40 transition-all duration-300 relative overflow-hidden flex flex-col justify-between group">
                    <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/15 rounded-full blur-3xl pointer-events-none group-hover:bg-blue-600/25 transition"></div>
                    
                    <div class="relative z-10 flex flex-wrap items-center justify-between gap-4 mb-8">
                        <span class="px-3 py-1 rounded-full bg-blue-500/20 border border-blue-500/30 text-xs font-mono font-semibold text-blue-300">
                            A20 BIONIC • 1.4nm QUANTUM
                        </span>
                        <span class="text-xs font-mono text-slate-400">180T OPs/Sec</span>
                    </div>

                    <div class="relative z-10 space-y-3 mb-8">
                        <h3 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                            Quantum-level processing.
                        </h3>
                        <p class="text-sm sm:text-base text-slate-300 max-w-xl leading-relaxed">
                            The world’s first photon-gated compute fabric. Delivers quantum-level simulations and on-device generative world-building with zero thermal throttling.
                        </p>
                    </div>

                    <!-- Visual Interactive Microchip Canvas/Graphic -->
                    <div class="relative z-10 w-full h-44 sm:h-52 rounded-2xl bg-dark-950/80 border border-white/10 p-5 flex items-center justify-between overflow-hidden">
                        <div class="space-y-2">
                            <div class="text-3xl sm:text-4xl font-extrabold text-gradient-holo">+340%</div>
                            <div class="text-xs text-slate-400 font-medium">Neural Compute vs A18 Pro</div>
                            <div class="text-xs text-blue-400 font-mono">64-Core Sub-Atomic GPU</div>
                        </div>
                        <!-- Animated Silicon Core Visualization -->
                        <div class="relative w-32 h-32 sm:w-36 sm:h-36 flex items-center justify-center">
                            <div class="absolute inset-0 rounded-2xl border border-blue-500/30 rotate-45 animate-pulse"></div>
                            <div class="absolute inset-3 rounded-xl border border-purple-500/40 -rotate-12"></div>
                            <div class="w-16 h-16 rounded-lg bg-gradient-to-tr from-blue-600 to-indigo-800 p-0.5 flex flex-col items-center justify-center text-white font-mono shadow-lg shadow-blue-500/50">
                                <span class="text-[10px] font-bold">A20</span>
                                <span class="text-[8px] text-blue-200">PRO</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. Holo-Display 3D (Col 4) -->
                <div class="lg:col-span-4 glass-card rounded-3xl p-8 sm:p-10 border border-white/10 hover:border-cyan-500/40 transition-all duration-300 relative overflow-hidden flex flex-col justify-between group">
                    <div class="absolute top-0 right-0 w-80 h-80 bg-cyan-600/15 rounded-full blur-3xl pointer-events-none group-hover:bg-cyan-600/25 transition"></div>

                    <div class="relative z-10 flex items-center justify-between mb-8">
                        <span class="px-3 py-1 rounded-full bg-cyan-500/20 border border-cyan-500/30 text-xs font-mono font-semibold text-cyan-300">
                            HOLO-DISPLAY
                        </span>
                        <span class="text-xs font-mono text-cyan-400">240Hz ProMotion</span>
                    </div>

                    <div class="relative z-10 space-y-3 mb-6">
                        <h3 class="text-2xl font-extrabold text-white tracking-tight">
                            Interact with 3D projections directly from your screen.
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                            Spatial microlenses emit volumetric beams into thin air. Pinch, rotate, and sculpt 3D models floating above your phone.
                        </p>
                    </div>

                    <!-- Holographic Visual -->
                    <div class="relative z-10 w-full h-36 rounded-2xl bg-dark-950/80 border border-white/10 flex items-center justify-center overflow-hidden">
                        <div class="relative flex items-center justify-center">
                            <div class="w-16 h-16 rounded-full bg-cyan-500/20 animate-ping absolute"></div>
                            <div class="w-20 h-20 border border-cyan-400/50 rounded-full animate-spin" style="animation-duration: 8s;"></div>
                            <svg class="w-8 h-8 text-cyan-300 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- 3. NeverCharge Battery (Col 4) -->
                <div class="lg:col-span-4 glass-card rounded-3xl p-8 sm:p-10 border border-white/10 hover:border-emerald-500/40 transition-all duration-300 relative overflow-hidden flex flex-col justify-between group">
                    <div class="absolute bottom-0 left-0 w-80 h-80 bg-emerald-600/15 rounded-full blur-3xl pointer-events-none group-hover:bg-emerald-600/25 transition"></div>

                    <div class="relative z-10 flex items-center justify-between mb-8">
                        <span class="px-3 py-1 rounded-full bg-emerald-500/20 border border-emerald-500/30 text-xs font-mono font-semibold text-emerald-300">
                            NEVERCHARGE™
                        </span>
                        <span class="text-xs font-mono text-emerald-400">0 Cables</span>
                    </div>

                    <div class="relative z-10 space-y-3 mb-6">
                        <h3 class="text-2xl font-extrabold text-white tracking-tight">
                            Powered by ambient kinetic energy.
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                            Up to 1 week of battery life. Nanogenerators turn movement and air vibration into constant electrical reserve. Forget charging blocks forever.
                        </p>
                    </div>

                    <div class="relative z-10 w-full h-36 rounded-2xl bg-dark-950/80 border border-white/10 p-4 flex items-center justify-around">
                        <div class="text-center">
                            <span class="text-3xl font-extrabold text-emerald-400">7 Days</span>
                            <p class="text-[10px] text-slate-400 uppercase tracking-wider">Unplugged Power</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-emerald-500/20 flex items-center justify-center text-emerald-400">
                            <svg class="w-6 h-6 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- 4. Hyper-Lens Camera (Col 8) -->
                <div id="camera" class="lg:col-span-8 glass-card rounded-3xl p-8 sm:p-10 border border-white/10 hover:border-purple-500/40 transition-all duration-300 relative overflow-hidden flex flex-col justify-between group">
                    <div class="absolute top-0 right-0 w-96 h-96 bg-purple-600/15 rounded-full blur-3xl pointer-events-none group-hover:bg-purple-600/25 transition"></div>

                    <div class="relative z-10 flex flex-wrap items-center justify-between gap-4 mb-8">
                        <span class="px-3 py-1 rounded-full bg-purple-500/20 border border-purple-500/30 text-xs font-mono font-semibold text-purple-300">
                            HYPER-LENS OPTICS
                        </span>
                        <span class="text-xs font-mono text-purple-400">200 Megapixels • f/0.95</span>
                    </div>

                    <div class="relative z-10 space-y-3 mb-8">
                        <h3 class="text-2xl sm:text-4xl font-extrabold text-white tracking-tight">
                            200MP sensor with AI-driven planetary zoom.
                        </h3>
                        <p class="text-sm sm:text-base text-slate-300 max-w-xl leading-relaxed">
                            Optical liquid prism element coupled with orbital neural image stabilization. Capture crater-level lunar fidelity and deep-sky nebulae in handheld 8K.
                        </p>
                    </div>

                    <!-- Interactive Camera Zoom Simulator -->
                    <div class="relative z-10 w-full rounded-2xl bg-dark-950/80 border border-white/10 p-5 space-y-4">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-400">Lossless Optical Zoom Level:</span>
                            <span id="zoom-indicator" class="font-mono text-purple-400 font-bold text-sm">100x Planetary</span>
                        </div>

                        <!-- Zoom Selector Buttons -->
                        <div class="grid grid-cols-4 gap-2">
                            <button onclick="setZoomPreview(1)" class="zoom-btn py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-mono text-slate-300 transition" data-zoom="1">1x Wide</button>
                            <button onclick="setZoomPreview(5)" class="zoom-btn py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-mono text-slate-300 transition" data-zoom="5">5x Tele</button>
                            <button onclick="setZoomPreview(25)" class="zoom-btn py-2 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-xs font-mono text-slate-300 transition" data-zoom="25">25x Ultra</button>
                            <button onclick="setZoomPreview(100)" class="zoom-btn py-2 rounded-xl bg-purple-600/40 border border-purple-400 text-xs font-mono text-white transition active" data-zoom="100">100x Lunar</button>
                        </div>

                        <!-- Visual simulation frame -->
                        <div class="relative h-28 rounded-xl bg-gradient-to-r from-slate-900 via-indigo-950 to-purple-950 overflow-hidden flex items-center justify-center border border-white/10">
                            <div id="zoom-visual" class="text-center transition-all duration-500 transform scale-100">
                                <div class="w-12 h-12 rounded-full bg-slate-200/90 shadow-[0_0_30px_rgba(255,255,255,0.7)] mx-auto flex items-center justify-center text-dark-950 font-bold text-xs">
                                    MOON
                                </div>
                                <span class="text-[10px] text-purple-300 font-mono mt-1 block">Focal Length: 1,200mm eq. • f/2.4</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>

        <!-- ==================== TECH SPECS SUMMARY TABLE ==================== -->
        <section id="specs" class="py-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto border-t border-white/5">
            <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                <h2 class="text-xs uppercase tracking-widest font-bold text-slate-400">Specifications Matrix</h2>
                <h3 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
                    Compare iPhone 18 Models.
                </h3>
                <p class="text-sm sm:text-base text-slate-400">
                    Precision comparison between standard next-gen and Pro flagship devices.
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse glass-card rounded-3xl overflow-hidden border border-white/10">
                    <thead>
                        <tr class="border-b border-white/10 bg-white/5">
                            <th class="py-5 px-6 text-xs uppercase tracking-wider text-slate-400 font-semibold w-1/4">Specification</th>
                            <th class="py-5 px-6 text-xs uppercase tracking-wider text-slate-300 font-bold w-1/4">iPhone 18</th>
                            <th class="py-5 px-6 text-xs uppercase tracking-wider text-blue-400 font-extrabold w-1/4 bg-blue-500/10 border-x border-blue-500/20">iPhone 18 Pro ★</th>
                            <th class="py-5 px-6 text-xs uppercase tracking-wider text-purple-400 font-extrabold w-1/4">iPhone 18 Pro Max</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-xs sm:text-sm">
                        <?php foreach ($specsComparison as $spec): ?>
                            <tr class="hover:bg-white/[0.02] transition">
                                <td class="py-4 px-6 font-semibold text-slate-300"><?= esc($spec['feature']) ?></td>
                                <td class="py-4 px-6 text-slate-400"><?= esc($spec['standard']) ?></td>
                                <td class="py-4 px-6 font-medium text-white bg-blue-500/5 border-x border-blue-500/20"><?= esc($spec['pro']) ?></td>
                                <td class="py-4 px-6 font-medium text-purple-200"><?= esc($spec['promax']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pricing / Model Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12 max-w-4xl mx-auto">
                <?php foreach ($pricingTiers as $tier): ?>
                    <div class="glass-card rounded-3xl p-8 border <?= $tier['highlighted'] ? 'border-blue-500/50 shadow-2xl shadow-blue-500/10' : 'border-white/10' ?> relative flex flex-col justify-between">
                        <?php if ($tier['highlighted']): ?>
                            <div class="absolute -top-3 right-8 px-3 py-1 rounded-full bg-blue-600 text-[10px] font-bold text-white uppercase tracking-wider">
                                Recommended
                            </div>
                        <?php endif; ?>
                        
                        <div>
                            <div class="text-xs font-mono text-slate-400 mb-1"><?= esc($tier['screen']) ?></div>
                            <h4 class="text-2xl font-bold text-white mb-2"><?= esc($tier['model']) ?></h4>
                            <div class="flex items-baseline gap-2 mb-6">
                                <span class="text-4xl font-extrabold text-white"><?= esc($tier['price']) ?></span>
                                <span class="text-xs text-slate-400">or <?= esc($tier['monthly']) ?></span>
                            </div>

                            <ul class="space-y-3 mb-8 text-xs text-slate-300">
                                <?php foreach ($tier['features'] as $f): ?>
                                    <li class="flex items-center gap-2.5">
                                        <svg class="w-4 h-4 text-blue-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span><?= esc($f) ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <button onclick="openPreOrderModal('<?= esc($tier['model']) ?>', '<?= esc($tier['price']) ?>')" class="w-full py-3.5 rounded-full <?= $tier['highlighted'] ? 'bg-blue-600 hover:bg-blue-500 text-white' : 'glass-card hover:bg-white/10 text-white' ?> text-xs font-semibold tracking-wide transition duration-200">
                            Configure & Pre-Order
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

    </main>

    <!-- ==================== PRE-ORDER MODAL / INTERACTIVE SHEET ==================== -->
    <div id="preorder-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 sm:p-6 bg-black/80 backdrop-blur-xl">
        <div class="glass-card w-full max-w-lg rounded-3xl p-6 sm:p-8 border border-white/20 shadow-2xl relative text-left animate-in fade-in zoom-in-95 duration-200">
            
            <!-- Close Button -->
            <button onclick="closePreOrderModal()" class="absolute top-5 right-5 text-slate-400 hover:text-white p-2 rounded-full hover:bg-white/10 transition">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Modal Header -->
            <div class="mb-6">
                <span class="text-xs font-bold text-blue-400 uppercase tracking-widest">FutureApple Reservation</span>
                <h3 class="text-2xl font-extrabold text-white mt-1" id="modal-model-title">Pre-Order iPhone 18 Pro</h3>
                <p class="text-xs text-slate-400 mt-1">Select your personalized configuration. Ships Fall 2026.</p>
            </div>

            <!-- Configuration Options -->
            <form id="preorder-form" onsubmit="handlePreOrderSubmit(event)" class="space-y-5">
                
                <!-- Capacity Selector -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-2">Storage Capacity</label>
                    <div class="grid grid-cols-3 gap-2.5">
                        <label class="relative flex flex-col p-3 rounded-2xl border border-blue-500/60 bg-blue-500/10 cursor-pointer text-center">
                            <input type="radio" name="storage" value="512GB" checked class="sr-only">
                            <span class="text-sm font-bold text-white">512 GB</span>
                            <span class="text-[10px] text-slate-400">Included</span>
                        </label>
                        <label class="relative flex flex-col p-3 rounded-2xl border border-white/10 hover:border-white/30 cursor-pointer text-center">
                            <input type="radio" name="storage" value="1TB" class="sr-only">
                            <span class="text-sm font-bold text-white">1 TB</span>
                            <span class="text-[10px] text-slate-400">+$200</span>
                        </label>
                        <label class="relative flex flex-col p-3 rounded-2xl border border-white/10 hover:border-white/30 cursor-pointer text-center">
                            <input type="radio" name="storage" value="2TB" class="sr-only">
                            <span class="text-sm font-bold text-white">2 TB</span>
                            <span class="text-[10px] text-slate-400">+$400</span>
                        </label>
                    </div>
                </div>

                <!-- Color Selection Radio -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-2">Finish</label>
                    <select id="modal-finish-select" class="w-full px-4 py-2.5 rounded-xl bg-dark-900 border border-white/10 text-white text-xs focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <?php foreach ($finishes as $f): ?>
                            <option value="<?= esc($f['name']) ?>"><?= esc($f['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Customer Email -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-2">Apple ID / Priority Email</label>
                    <input type="email" required placeholder="moreno@futureapple.tech" class="w-full px-4 py-2.5 rounded-xl bg-dark-900 border border-white/10 text-white text-xs placeholder-slate-500 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Reservation Total -->
                <div class="pt-3 border-t border-white/10 flex items-center justify-between text-xs">
                    <span class="text-slate-400">Estimated Total:</span>
                    <span class="text-lg font-extrabold text-white" id="modal-price-display"><?= esc($product['priceStarting']) ?></span>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full py-3.5 rounded-full bg-blue-600 hover:bg-blue-500 text-white font-semibold text-xs tracking-wider uppercase transition shadow-lg shadow-blue-500/25">
                    Confirm Priority Reservation
                </button>
            </form>

            <div id="preorder-success" class="hidden text-center py-8 space-y-3">
                <div class="w-12 h-12 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center mx-auto">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <h4 class="text-xl font-bold text-white">Reservation Confirmed!</h4>
                <p class="text-xs text-slate-400 max-w-xs mx-auto">Your priority allocation for iPhone 18 Pro has been secured. Check your email for keynote streaming credentials.</p>
                <button onclick="closePreOrderModal()" class="px-6 py-2 rounded-full bg-white/10 hover:bg-white/20 text-white text-xs font-medium transition">
                    Done
                </button>
            </div>

        </div>
    </div>

    <!-- ==================== FOOTER ==================== -->
    <footer class="border-t border-white/10 bg-dark-950/90 text-slate-400 text-xs py-14 px-4 sm:px-6 lg:px-8 relative z-20">
        <div class="max-w-7xl mx-auto space-y-8">
            
            <!-- Legal Notes / Disclaimer -->
            <div class="space-y-2 text-[11px] text-slate-500 border-b border-white/5 pb-8 leading-relaxed">
                <p>1. Holographic spatial display requires ambient lux conditions between 5 and 5,000 lux. Gesture tracking operational within a 45-degree volumetric cone.</p>
                <p>2. NeverCharge™ battery utilizes micro-electromechanical kinetic harvesting. Battery endurance based on standard motion patterns of 4,000+ daily steps.</p>
                <p>3. iPhone 18 Pro, FutureApple, A20 Quantum Pro, and NeverCharge are conceptual marks engineered by Moreno for futuristic demonstration purposes.</p>
            </div>

            <!-- Navigation and Credits -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                
                <div class="flex items-center gap-3">
                    <span class="font-bold text-slate-200">FutureApple</span>
                    <span>&bull;</span>
                    <span>Creator / Developer: <strong class="text-slate-200"><?= esc($meta['author']) ?></strong></span>
                </div>

                <!-- Active URL Path Reference as required in agent.md -->
                <div class="px-3 py-1.5 rounded-full bg-white/5 border border-white/10 text-[11px] font-mono text-slate-400 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span>Active URL: <strong class="text-slate-200">moreno-futureapple.tech/iPhone-18-pro/</strong></span>
                </div>

                <div>
                    <p>Copyright &copy; <?= esc($meta['year']) ?> <?= esc($meta['author']) ?> &mdash; FutureApple Tech.</p>
                </div>
            </div>

        </div>
    </footer>

    <!-- ==================== VANILLA JAVASCRIPT INTERACTIONS ==================== -->
    <script>
        // Interactive Finish Switcher
        function setPhoneFinish(id, name, hex, glow) {
            const chassis = document.getElementById('phone-chassis');
            const ambientGlow = document.getElementById('ambient-glow-primary');
            const descEl = document.getElementById('finish-desc');
            const modalSelect = document.getElementById('modal-finish-select');

            // Update Active Buttons
            document.querySelectorAll('.finish-btn').forEach(btn => {
                const ring = btn.querySelector('span');
                if (btn.getAttribute('data-finish-id') === id) {
                    ring.classList.add('border-white', 'scale-110', 'shadow-lg');
                    ring.classList.remove('border-white/20');
                } else {
                    ring.classList.remove('border-white', 'scale-110', 'shadow-lg');
                    ring.classList.add('border-white/20');
                }
            });

            // Color specific styling
            if (id === 'obsidian') {
                chassis.style.borderColor = '#20222a';
                chassis.style.boxShadow = '0 25px 60px -15px rgba(0,0,0,0.9), 0 0 60px rgba(80, 100, 255, 0.35)';
                ambientGlow.style.backgroundColor = 'rgba(59, 130, 246, 0.2)';
                descEl.textContent = 'Deep light-absorbing stealth black forged with titanium carbide.';
            } else if (id === 'nebula') {
                chassis.style.borderColor = '#4a256a';
                chassis.style.boxShadow = '0 25px 60px -15px rgba(0,0,0,0.9), 0 0 60px rgba(168, 85, 247, 0.45)';
                ambientGlow.style.backgroundColor = 'rgba(168, 85, 247, 0.25)';
                descEl.textContent = 'Luminescent deep purple that shifts color under direct ambient light.';
            } else if (id === 'titanium') {
                chassis.style.borderColor = '#5f636e';
                chassis.style.boxShadow = '0 25px 60px -15px rgba(0,0,0,0.9), 0 0 60px rgba(148, 163, 184, 0.35)';
                ambientGlow.style.backgroundColor = 'rgba(148, 163, 184, 0.2)';
                descEl.textContent = 'Precision-machined Grade 6 liquid titanium with micro-brushed texture.';
            } else if (id === 'silver') {
                chassis.style.borderColor = '#c0c5d4';
                chassis.style.boxShadow = '0 25px 60px -15px rgba(0,0,0,0.9), 0 0 60px rgba(224, 231, 255, 0.45)';
                ambientGlow.style.backgroundColor = 'rgba(224, 231, 255, 0.25)';
                descEl.textContent = 'Mirrored aerospace alloy reflecting clean photons and ultra-minimalism.';
            }

            if (modalSelect) {
                modalSelect.value = name;
            }
        }

        // 3D Parallax Tilt on Mouse Move for Hero Device
        const container = document.getElementById('hero-phone-container');
        const phone = document.getElementById('phone-chassis');

        if (container && phone && window.matchMedia('(hover: hover)').matches) {
            container.addEventListener('mousemove', (e) => {
                const rect = container.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;

                const rotateX = (-y / rect.height) * 20;
                const rotateY = (x / rect.width) * 20;

                phone.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            });

            container.addEventListener('mouseleave', () => {
                phone.style.transform = 'rotateX(0deg) rotateY(0deg)';
            });
        }

        // Camera Zoom Simulator
        function setZoomPreview(level) {
            const visual = document.getElementById('zoom-visual');
            const indicator = document.getElementById('zoom-indicator');
            const buttons = document.querySelectorAll('.zoom-btn');

            buttons.forEach(btn => {
                if (parseInt(btn.getAttribute('data-zoom')) === level) {
                    btn.classList.add('bg-purple-600/40', 'border-purple-400', 'text-white');
                    btn.classList.remove('bg-white/5', 'text-slate-300');
                } else {
                    btn.classList.remove('bg-purple-600/40', 'border-purple-400', 'text-white');
                    btn.classList.add('bg-white/5', 'text-slate-300');
                }
            });

            if (level === 1) {
                indicator.textContent = '1x Wide Lens (24mm)';
                visual.style.transform = 'scale(0.5)';
            } else if (level === 5) {
                indicator.textContent = '5x Optical Periscope (120mm)';
                visual.style.transform = 'scale(0.85)';
            } else if (level === 25) {
                indicator.textContent = '25x Hybrid Macro (600mm)';
                visual.style.transform = 'scale(1.3)';
            } else if (level === 100) {
                indicator.textContent = '100x Planetary AI (1,200mm)';
                visual.style.transform = 'scale(1.8)';
            }
        }

        // Pre-Order Modal Logic
        function openPreOrderModal(model = 'iPhone 18 Pro', price = '$1,199') {
            const modal = document.getElementById('preorder-modal');
            const titleEl = document.getElementById('modal-model-title');
            const priceEl = document.getElementById('modal-price-display');
            const form = document.getElementById('preorder-form');
            const success = document.getElementById('preorder-success');

            if (titleEl) titleEl.textContent = `Pre-Order ${model}`;
            if (priceEl) priceEl.textContent = price;
            
            form.classList.remove('hidden');
            success.classList.add('hidden');
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closePreOrderModal() {
            const modal = document.getElementById('preorder-modal');
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        function handlePreOrderSubmit(e) {
            e.preventDefault();
            const form = document.getElementById('preorder-form');
            const success = document.getElementById('preorder-success');
            form.classList.add('hidden');
            success.classList.remove('hidden');
        }

        // Mobile Menu
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        function closeMobileMenu() {
            mobileMenu.classList.add('hidden');
        }

        // Storage radio button interactive selection
        document.querySelectorAll('input[name="storage"]').forEach(radio => {
            radio.parentElement.addEventListener('click', () => {
                document.querySelectorAll('input[name="storage"]').forEach(r => {
                    r.parentElement.classList.remove('border-blue-500/60', 'bg-blue-500/10');
                    r.parentElement.classList.add('border-white/10');
                });
                radio.parentElement.classList.add('border-blue-500/60', 'bg-blue-500/10');
                radio.parentElement.classList.remove('border-white/10');
            });
        });
    </script>
</body>
</html>
