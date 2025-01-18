<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use HubSpot\Factory;

class HubSpotWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // 1. Verifica la firma del webhook (opcional pero recomendado)
        // ... (Implementa la lógica para verificar la firma del webhook)

        // 2. Procesa los datos del webhook
        $data = $request->all();

        // 3. Identifica el tipo de evento
        $eventType = $data['subscriptionType'] ?? null;

        // 4. Realiza acciones según el tipo de evento
        if ($eventType === 'deal.creation') {
            $dealId = $data['objectId'];

            // Token de acceso de HubSpot
            $hubSpotApiKey = config('services.hubspot.api_key'); // Mejor práctica: obtener la API key de la configuración

            try {
                // Crea una instancia del cliente de HubSpot
                $hubSpot = Factory::createWithApiKey($hubSpotApiKey);

                // Obtén los detalles del deal (proyecto) desde HubSpot
                $response = $hubSpot->crm()->deals()->basicApi()->getById($dealId);
                $dealProperties = $response->getProperties();

                // Crea un nuevo proyecto en tu base de datos
                $project = Project::create([
                    'name' => $dealProperties['dealname'],
                    'user_id' => $this->getUserIdFromDeal($dealProperties), // Lógica para obtener el usuario del deal
                    'status' => 'En evaluación', // O el estado inicial que corresponda
                    // ... mapea otras propiedades del deal a tu modelo Project
                ]);

                // Crea las etapas del proyecto 
                $project->stages()->createMany([
                    ['name' => 'Etapa 1: Aprobación', 'status' => 'En revisión'],
                    ['name' => 'Etapa 2: Financiación', 'status' => 'Pendiente'], 
                ]);

                // (Opcional) Envía una notificación al usuario
                // ...

                return response()->json(['message' => 'Webhook recibido y procesado correctamente'], 200);

            } catch (\Exception $e) {
                // Maneja los errores de la API de HubSpot
                \Log::error('Error al procesar el webhook de HubSpot: ' . $e->getMessage());
                return response()->json(['message' => 'Error al procesar el webhook'], 500);
            }
        }

        // 5. Retorna una respuesta 2xx para indicar que la solicitud se procesó correctamente
        return response()->json(['message' => 'Webhook recibido correctamente'], 200);
    }

    // Función auxiliar para obtener el ID del usuario a partir de los datos del deal
    private function getUserIdFromDeal($dealProperties)
    {
        // Implementa la lógica para obtener el ID del usuario
        // ... (por ejemplo, buscar el usuario por email en $dealProperties)
        // ...

        // Si no se encuentra el usuario, puedes asignarlo a un usuario por defecto o lanzar una excepción
        // ...

        return auth()->id(); // Reemplaza esto con la lógica correcta
    }
}