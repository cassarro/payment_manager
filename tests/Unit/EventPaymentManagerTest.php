<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Event;
use App\Models\Company;
use App\Models\PaymentMethod;
use App\Models\EventPayment;
use App\Models\PaymentProviderRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventPaymentManagerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function event_payment_belongs_to_event()
    {
        $event = Event::factory()->create();
        $eventPayment = EventPayment::factory()->create(['event_id' => $event->id]);

        $this->assertEquals($eventPayment->event->id, $event->id);
    }

    /** @test */
    public function event_payment_belongs_to_company()
    {
        $company = Company::factory()->create();
        $eventPayment = EventPayment::factory()->create(['company_id' => $company->id]);

        $this->assertEquals($eventPayment->company->id, $company->id);
    }

    /** @test */
    public function event_payment_belongs_to_payment_method()
    {
        $paymentMethod = PaymentMethod::factory()->create();
        $eventPayment = EventPayment::factory()->create(['payment_method_id' => $paymentMethod->id]);

        $this->assertEquals($eventPayment->paymentMethod->id, $paymentMethod->id);
    }

    /** @test */
    public function it_can_create_event_payment()
    {
        $event = Event::factory()->create();
        $company = Company::factory()->create();
        $paymentMethod = PaymentMethod::factory()->create();

        $eventPayment = EventPayment::create([
            'event_id' => $event->id,
            'company_id' => $company->id,
            'payment_method_id' => $paymentMethod->id,
            'vat_rate' => 18.00,
        ]);

        $this->assertDatabaseHas('event_payments', [
            'event_id' => $event->id,
            'company_id' => $company->id,
            'payment_method_id' => $paymentMethod->id,
            'vat_rate' => 18.00,
        ]);
    }

    /** @test */
    public function it_can_create_payment_provider_request()
    {
        $event = Event::factory()->create();
        $company = Company::factory()->create();

        $paymentProviderRequest = PaymentProviderRequest::create([
            'payment_method_name' => 'CryptoPay',
            'website' => 'https://cryptopay.com',
            'event_id' => $event->id,
            'company_id' => $company->id,
            'status' => 'pending',
        ]);

        $this->assertDatabaseHas('payment_provider_requests', [
            'payment_method_name' => 'CryptoPay',
            'website' => 'https://cryptopay.com',
            'event_id' => $event->id,
            'company_id' => $company->id,
            'status' => 'pending',
        ]);
    }

    /** @test */
    public function it_can_approve_payment_provider_request()
    {
        $paymentProviderRequest = PaymentProviderRequest::factory()->create(['status' => 'pending']);

        $paymentProviderRequest->update(['status' => 'approved']);

        $this->assertDatabaseHas('payment_provider_requests', [
            'id' => $paymentProviderRequest->id,
            'status' => 'approved',
        ]);
    }

    /** @test */
    public function api_can_retrieve_events()
    {
        $this->withoutExceptionHandling();
        $events = Event::factory()->count(3)->create();

        $response = $this->getJson('/api/events');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function api_can_retrieve_payment_methods()
    {
        PaymentMethod::factory()->count(3)->create();

        $response = $this->getJson('/api/payment-methods');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function api_can_retrieve_companies()
    {
        Company::factory()->count(3)->create();

        $response = $this->getJson('/api/companies');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function api_can_retrieve_payment_provider_requests()
    {
        PaymentProviderRequest::factory()->count(2)->create();

        $response = $this->getJson('/api/payment-provider-requests');

        $response->assertStatus(200)
            ->assertJsonCount(2);
    }
}

