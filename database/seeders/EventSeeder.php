<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Competition;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // نتأكد إنه فيه منظمة نستخدمها، أو ننشئ وحدة تجريبية لو ما فيه
        $organization = Organization::first() ?? Organization::create([
            'name' => 'Test Organization',
            'slug' => 'test-organization',
            'email' => 'org@example.com',
            'password' => bcrypt('Password123'),
            'status' => Organization::STATUS_APPROVED,
        ]);

        // فعالية من نوع Competition (هاي بس بتاخد صف إضافي بجدول competitions)
        $hackathon = Event::create([
            'organization_id' => $organization->id,
            'title' => 'Global AI Innovation Challenge',
            'description' => 'A hackathon for building AI-powered solutions.',
            'type' => Event::TYPE_COMPETITION,
            'location' => 'Amman, JO',
            'start_date' => '2026-10-01',
            'end_date' => '2026-10-03',
            'requirements' => 'Teams of 2-4 members, basic programming knowledge.',
            'status' => Event::STATUS_APPROVED,
        ]);

        Competition::create([
            'id' => $hackathon->id,
            'prize' => '$10,000 Prize Pool',
            'team_size' => '2-4 members',
        ]);

        // فعالية من نوع Workshop (بدون صف إضافي)
        Event::create([
            'organization_id' => $organization->id,
            'title' => 'Intro to Cloud Computing',
            'description' => 'A hands-on workshop covering cloud fundamentals.',
            'type' => Event::TYPE_WORKSHOP,
            'location' => 'Online',
            'start_date' => '2026-10-10',
            'end_date' => '2026-10-10',
            'status' => Event::STATUS_APPROVED,
        ]);

        // فعالية من نوع Event (بدون صف إضافي)
        Event::create([
            'organization_id' => $organization->id,
            'title' => 'Tech Career Fair',
            'description' => 'Meet recruiters from top tech companies.',
            'type' => Event::TYPE_EVENT,
            'location' => 'Amman, JO',
            'start_date' => '2026-10-15',
            'end_date' => '2026-10-15',
            'status' => Event::STATUS_APPROVED,
        ]);

        // فعالية من نوع Course (بدون صف إضافي)
        Event::create([
            'organization_id' => $organization->id,
            'title' => 'Product Strategy Course',
            'description' => 'Learn the fundamentals of product strategy.',
            'type' => Event::TYPE_COURSE,
            'location' => 'Online',
            'start_date' => '2026-10-20',
            'end_date' => '2026-11-20',
            'status' => Event::STATUS_APPROVED,
        ]);
    }
}