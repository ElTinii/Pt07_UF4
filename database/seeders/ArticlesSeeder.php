<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Aixo el que fa es eliminar primer tots els articles que hi hagi a la taula articles
        DB::table('articles')->truncate();
        $articlesData = [
            [
                'Titol' => 'Los desafíos de la inteligencia artificial en la industria automotriz',
                'text' => 'La integración de la inteligencia artificial en la industria automotriz ha abierto nuevas posibilidades, pero también plantea desafíos significativos en términos de seguridad, privacidad y regulación.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El papel de la tecnología blockchain en la transformación digital',
                'text' => 'La tecnología blockchain está revolucionando la forma en que se llevan a cabo las transacciones digitales, ofreciendo mayor seguridad, transparencia y eficiencia en una amplia gama de industrias, desde las finanzas hasta la cadena de suministro.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El futuro de la exploración espacial',
                'text' => 'La exploración espacial ha capturado la imaginación de la humanidad durante décadas. A medida que avanzamos hacia el futuro, nuevas misiones, tecnologías y colaboraciones internacionales están allanando el camino para descubrimientos aún más emocionantes en el cosmos.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El impacto de la inteligencia artificial en la creatividad artística',
                'text' => 'La inteligencia artificial está desafiando las nociones tradicionales de creatividad artística al ofrecer nuevas herramientas y enfoques para la expresión creativa. A medida que los artistas exploran el potencial de la IA, surgen preguntas sobre la originalidad, la autenticidad y el papel humano en el proceso creativo.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El impacto de la inteligencia artificial en la medicina',
                'text' => 'La inteligencia artificial está transformando la medicina de formas innovadoras, desde diagnósticos más precisos hasta tratamientos personalizados.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'Explorando los beneficios del mindfulness en el trabajo',
                'text' => 'El mindfulness en el entorno laboral está ganando popularidad debido a sus numerosos beneficios, que incluyen la reducción del estrés y el aumento de la productividad.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El futuro de la energía renovable',
                'text' => 'Las energías renovables como la solar y la eólica están marcando el camino hacia un futuro más sostenible y menos dependiente de los combustibles fósiles.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El impacto de la pandemia en la educación',
                'text' => 'La pandemia de COVID-19 ha transformado la educación en todo el mundo, obligando a adaptaciones rápidas y cambios significativos en la forma en que aprendemos y enseñamos.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El arte de la cocina molecular',
                'text' => 'La cocina molecular combina la ciencia y el arte culinario para crear platos innovadores y experiencias gastronómicas únicas que desafían las expectativas tradicionales.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El impacto de la inteligencia artificial en la agricultura',
                'text' => 'La inteligencia artificial está revolucionando la agricultura al proporcionar herramientas y técnicas avanzadas para mejorar la productividad, la eficiencia y la sostenibilidad en la producción de alimentos.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'Los desafíos éticos de la realidad virtual',
                'text' => 'La realidad virtual plantea una serie de desafíos éticos, desde cuestiones de privacidad y seguridad hasta preocupaciones sobre la percepción de la realidad y el impacto en la salud mental.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El futuro del trabajo remoto',
                'text' => 'El trabajo remoto ha experimentado un crecimiento exponencial en los últimos años, y su futuro promete transformaciones aún más profundas en la forma en que trabajamos y colaboramos.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El impacto de la inteligencia artificial en el sector financiero',
                'text' => 'La inteligencia artificial está transformando el sector financiero al automatizar procesos, mejorar la precisión en la toma de decisiones y ofrecer experiencias personalizadas a los clientes.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'Explorando los límites de la computación cuántica',
                'text' => 'La computación cuántica promete revolucionar la informática al ofrecer capacidades de procesamiento incomparables. Sin embargo, aún enfrenta numerosos desafíos técnicos y científicos en su camino hacia la adopción generalizada.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El futuro de la medicina regenerativa',
                'text' => 'La medicina regenerativa ofrece la esperanza de curar enfermedades y lesiones crónicas al aprovechar el poder de la biología para regenerar tejidos y órganos dañados.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El impacto de la inteligencia artificial en el arte',
                'text' => 'La inteligencia artificial está transformando la creación artística al ofrecer nuevas herramientas y formas de explorar la expresión creativa. Sin embargo, también plantea preguntas sobre la autenticidad y la originalidad en el arte generado por máquinas.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El auge de las ciudades inteligentes',
                'text' => 'Las ciudades inteligentes utilizan la tecnología para mejorar la calidad de vida de sus habitantes al optimizar servicios públicos, gestionar recursos de manera eficiente y promover la sostenibilidad ambiental.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'La revolución de la movilidad eléctrica',
                'text' => 'La movilidad eléctrica está transformando la industria automotriz al ofrecer vehículos más limpios, silenciosos y eficientes. A medida que avanza la tecnología de baterías y se expande la infraestructura de carga, los vehículos eléctricos están ganando terreno en todo el mundo.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El impacto de la inteligencia artificial en el cuidado de la salud mental',
                'text' => 'La inteligencia artificial está siendo utilizada para mejorar el diagnóstico y tratamiento de trastornos de salud mental al analizar grandes conjuntos de datos y proporcionar intervenciones personalizadas y basadas en evidencia.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'Explorando el potencial de la realidad aumentada',
                'text' => 'La realidad aumentada está cambiando la forma en que interactuamos con el mundo que nos rodea al superponer información digital en el entorno físico. Desde aplicaciones de entretenimiento hasta herramientas de productividad, la AR está demostrando ser una tecnología versátil con numerosas aplicaciones.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El futuro de la educación online',
                'text' => 'La educación en línea ha experimentado un crecimiento exponencial en los últimos años, brindando acceso a la educación de calidad a personas de todo el mundo. A medida que la tecnología continúa evolucionando, se espera que la educación en línea siga desempeñando un papel crucial en el aprendizaje del siglo XXI.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El papel de la inteligencia artificial en la conservación del medio ambiente',
                'text' => 'La inteligencia artificial está siendo utilizada para abordar algunos de los mayores desafíos ambientales de nuestro tiempo, desde la conservación de la biodiversidad hasta la mitigación del cambio climático. Al aprovechar el poder del aprendizaje automático y el análisis de datos, los investigadores y conservacionistas pueden tomar decisiones más informadas y efectivas para proteger nuestro planeta.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'La ética de la edición genética',
                'text' => 'La edición genética, especialmente la técnica CRISPR-Cas9, ofrece la capacidad de modificar el ADN de manera precisa y eficiente. Sin embargo, plantea importantes preguntas éticas y morales sobre la modificación de la herencia genética y el potencial de la ingeniería genética para crear desigualdades sociales.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El futuro del transporte urbano',
                'text' => 'El transporte urbano está experimentando una transformación radical a medida que las ciudades buscan soluciones más sostenibles y eficientes para abordar la congestión del tráfico y la contaminación. Desde vehículos eléctricos compartidos hasta sistemas de transporte público inteligente, el futuro del transporte urbano promete ser más limpio, seguro y accesible para todos.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El impacto de la inteligencia artificial en la medicina',
                'text' => 'La inteligencia artificial está transformando la medicina de formas innovadoras, desde diagnósticos más precisos hasta tratamientos personalizados.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'Explorando los beneficios del mindfulness en el trabajo',
                'text' => 'El mindfulness en el entorno laboral está ganando popularidad debido a sus numerosos beneficios, que incluyen la reducción del estrés y el aumento de la productividad.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El futuro de la energía renovable',
                'text' => 'Las energías renovables como la solar y la eólica están marcando el camino hacia un futuro más sostenible y menos dependiente de los combustibles fósiles.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El impacto de la pandemia en la educación',
                'text' => 'La pandemia de COVID-19 ha transformado la educación en todo el mundo, obligando a adaptaciones rápidas y cambios significativos en la forma en que aprendemos y enseñamos.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El arte de la cocina molecular',
                'text' => 'La cocina molecular combina la ciencia y el arte culinario para crear platos innovadores y experiencias gastronómicas únicas que desafían las expectativas tradicionales.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El impacto de la inteligencia artificial en la agricultura',
                'text' => 'La inteligencia artificial está revolucionando la agricultura al proporcionar herramientas y técnicas avanzadas para mejorar la productividad, la eficiencia y la sostenibilidad en la producción de alimentos.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'Los desafíos éticos de la realidad virtual',
                'text' => 'La realidad virtual plantea una serie de desafíos éticos, desde cuestiones de privacidad y seguridad hasta preocupaciones sobre la percepción de la realidad y el impacto en la salud mental.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El futuro del trabajo remoto',
                'text' => 'El trabajo remoto ha experimentado un crecimiento exponencial en los últimos años, y su futuro promete transformaciones aún más profundas en la forma en que trabajamos y colaboramos.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Titol' => 'El impacto de la inteligencia artificial en el sector financiero',
                'text' => 'La inteligencia artificial',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        foreach ($articlesData as $article) {
            DB::table('articles')->insert($article);
        }

        // Puedes añadir tantos registros como quieras
    }
}
