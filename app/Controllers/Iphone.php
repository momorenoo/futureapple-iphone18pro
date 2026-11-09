<?php

namespace App\Controllers;

class Iphone extends BaseController
{
    /**
     * Display the iPhone 18 Pro futuristic landing page.
     *
     * @return string
     */
    public function index(): string
    {
        $data = [
            'meta' => [
                'title'       => 'iPhone 18 Pro - The Future is Here | FutureApple',
                'description' => 'Mind-bending performance. Holographic display. Titanium redefined. Experience the revolutionary iPhone 18 Pro.',
                'author'      => 'Moreno',
                'canonical'   => 'https://moreno-futureapple.tech/iPhone-18-pro/',
                'year'        => date('Y') > 2026 ? date('Y') : 2026,
            ],
            'product' => [
                'name'          => 'iPhone 18 Pro',
                'series'        => 'Pro & Pro Max',
                'tagline'       => 'The Future is Here.',
                'subheadline'   => 'Mind-bending performance. Holographic display. Titanium redefined.',
                'priceStarting' => '$1,199',
                'currency'      => 'USD',
                'releaseWindow' => 'Fall 2026',
            ],
            'finishes' => [
                [
                    'id'          => 'obsidian',
                    'name'        => 'Cosmic Obsidian',
                    'hex'         => '#0c0d12',
                    'accentGlow'  => 'rgba(80, 100, 255, 0.45)',
                    'description' => 'Deep light-absorbing stealth black forged with titanium carbide.',
                ],
                [
                    'id'          => 'nebula',
                    'name'        => 'Nebula Violet',
                    'hex'         => '#301844',
                    'accentGlow'  => 'rgba(168, 85, 247, 0.55)',
                    'description' => 'Luminescent deep purple that shifts color under direct ambient light.',
                ],
                [
                    'id'          => 'titanium',
                    'name'        => 'Natural Quantum',
                    'hex'         => '#8c8d92',
                    'accentGlow'  => 'rgba(148, 163, 184, 0.45)',
                    'description' => 'Precision-machined Grade 6 liquid titanium with micro-brushed texture.',
                ],
                [
                    'id'          => 'silver',
                    'name'        => 'Stellar Silver',
                    'hex'         => '#d9dde8',
                    'accentGlow'  => 'rgba(224, 231, 255, 0.6)',
                    'description' => 'Mirrored aerospace alloy reflecting clean photons and ultra-minimalism.',
                ],
            ],
            'bentoFeatures' => [
                [
                    'tag'         => 'PERFORMANCE',
                    'title'       => 'A20 Bionic Chip',
                    'headline'    => 'Quantum-level processing.',
                    'desc'        => 'First-ever 1.4nm sub-atomic transistor architecture. 64-core Neural Engine executing 180 trillion ops/sec for real-time generative physics.',
                    'colSpan'     => 'lg:col-span-8',
                    'gradient'    => 'from-blue-600/20 via-purple-600/10 to-transparent',
                    'badge'       => '1.4nm Quantum Core',
                    'stat'        => '+340%',
                    'statLabel'   => 'Neural Compute vs A18',
                ],
                [
                    'tag'         => 'DISPLAY',
                    'title'       => 'Holo-Display 3D',
                    'headline'    => 'Spatial projection directly from your glass.',
                    'desc'        => 'True volumetric light field emitting realistic interactive holograms 25cm above the screen with haptic air feedback.',
                    'colSpan'     => 'lg:col-span-4',
                    'gradient'    => 'from-cyan-500/20 via-blue-600/10 to-transparent',
                    'badge'       => '360° Volumetric',
                    'stat'        => '240Hz',
                    'statLabel'   => 'Adaptive ProMotion Ultra',
                ],
                [
                    'tag'         => 'POWER',
                    'title'       => 'NeverCharge™ Battery',
                    'headline'    => 'Ambient kinetic & thermal energy harvesting.',
                    'desc'        => 'No plugs needed. Micro-piezoelectric nanogenerators convert your daily motion and ambient electromagnetic waves into endless juice.',
                    'colSpan'     => 'lg:col-span-4',
                    'gradient'    => 'from-emerald-500/20 via-teal-600/10 to-transparent',
                    'badge'       => 'Self-Harvesting',
                    'stat'        => 'Up to 7 Days',
                    'statLabel'   => 'Unplugged Autonomy',
                ],
                [
                    'tag'         => 'OPTICS',
                    'title'       => 'Hyper-Lens Quad Matrix',
                    'headline'    => '200MP with planetary telescope zoom.',
                    'desc'        => 'Liquid crystal aperture shifting dynamically from f/0.95 to f/16. AI-assisted planetary zoom resolves craters on lunar surfaces in 8K HDR.',
                    'colSpan'     => 'lg:col-span-8',
                    'gradient'    => 'from-purple-600/20 via-pink-600/10 to-transparent',
                    'badge'       => '200 Megapixels',
                    'stat'        => '100x Optical',
                    'statLabel'   => 'Lossless Periscope Zoom',
                ],
            ],
            'specsComparison' => [
                [
                    'feature'   => 'Display Size & Tech',
                    'standard'  => '6.1" Super Retina OLED (120Hz)',
                    'pro'       => '6.3" Holo-Super Retina XDR (240Hz Volumetric)',
                    'promax'    => '6.9" Holo-Super Retina XDR (240Hz Volumetric)',
                ],
                [
                    'feature'   => 'Processor',
                    'standard'  => 'A20 Fusion (2nm)',
                    'pro'       => 'A20 Quantum Pro (1.4nm Photonic)',
                    'promax'    => 'A20 Quantum Ultra Max (1.4nm Photonic)',
                ],
                [
                    'feature'   => 'Camera Array',
                    'standard'  => 'Dual 48MP Fusion + Ultra Wide',
                    'pro'       => 'Quad 200MP Hyper-Lens + LiDAR 2.0',
                    'promax'    => 'Quad 200MP Hyper-Lens + Tele-Astrophotography',
                ],
                [
                    'feature'   => 'Body & Chassis',
                    'standard'  => 'Aerospace Recycled Aluminum',
                    'pro'       => 'Grade 6 Liquid Titanium Nanocoat',
                    'promax'    => 'Grade 6 Liquid Titanium Nanocoat',
                ],
                [
                    'feature'   => 'Battery & Charging',
                    'standard'  => 'MagSafe 35W (48h Battery)',
                    'pro'       => 'NeverCharge™ Kinetic Matrix (7 Days)',
                    'promax'    => 'NeverCharge™ Kinetic Matrix+ (10 Days)',
                ],
                [
                    'feature'   => 'Spatial Telepathy',
                    'standard'  => 'Spatial Audio 3D',
                    'pro'       => 'Apple Neural Link v1 Direct Pairing',
                    'promax'    => 'Apple Neural Link v1 Direct Pairing',
                ],
                [
                    'feature'   => 'Storage Capacities',
                    'standard'  => '256GB / 512GB',
                    'pro'       => '512GB / 1TB / 2TB Terabyte Flash',
                    'promax'    => '1TB / 2TB / 4TB Terabyte Flash',
                ],
            ],
            'pricingTiers' => [
                [
                    'model'       => 'iPhone 18 Pro',
                    'screen'      => '6.3-inch Holo-Display',
                    'price'       => '$1,199',
                    'monthly'     => '$49.95/mo',
                    'features'    => ['A20 Quantum Chip', '200MP Hyper-Lens', '7-Day Kinetic Battery', 'Grade 6 Titanium'],
                    'highlighted' => true,
                ],
                [
                    'model'       => 'iPhone 18 Pro Max',
                    'screen'      => '6.9-inch Holo-Display',
                    'price'       => '$1,399',
                    'monthly'     => '$58.29/mo',
                    'features'    => ['A20 Quantum Ultra Max', 'Astrophotography Matrix', '10-Day Kinetic Battery', '100x Lossless Zoom'],
                    'highlighted' => false,
                ],
            ],
        ];

        return view('iphone_18_pro', $data);
    }
}
